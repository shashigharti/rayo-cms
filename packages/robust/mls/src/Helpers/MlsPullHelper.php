<?php
namespace Robust\Mls\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;
use Robust\Mls\Models\Listing;
use Robust\Mls\Models\ListingImages;
use Robust\Mls\Models\MlsDataMap;
use Robust\Mls\Models\MlsDataRemap;
use Robust\Mls\Models\MlsLog;
use Robust\Mls\Models\MlsQuery;

/**
 * Class MlsPullHelper
 * @package Robust\Mls\Helpers
 */
class MlsPullHelper
{
    /**
     * @param $id
     * @param $class
     * @param $resource
     * @param $limit
     * @return mixed
     */
    public function createLog($id, $class, $resource, $limit)
    {
        $id = MlsLog::create([
           'class' => $class,
            'resource' => $resource,
            'mls_user_id' => $id,
            'query_limit'=> $limit
        ])->id;
        return $id;
    }

    /**
     * @param $property
     * @return string
     */
    public function getSelectColumns($property)
    {
        $maps = json_decode($property->maps,true);
        $select = array_values($maps);
        $additional = json_decode($property->additional,true);
        if(!empty($additional))
        {
            $additional_field = array_keys($additional);
            $select = array_merge($select,$additional_field);
        }

        $columns = implode(',',$select);
        return $columns;
    }

    /**
     * @param $id
     * @param $property
     * @return array
     */
    public function getFilteredQuery($id, $property)
    {
        $maps = json_decode($property->maps,true);
        $mls_query = MlsQuery::where('mls_user_id',$id)->first();
        $mls_query_filter = json_decode($mls_query->query_filter,true);
        $limit = $mls_query->query_limit;
        $picture = $mls_query->picture;
        $number_of_days = $mls_query->number_of_days;
        $query = '';
        if(!empty($mls_query_filter)){
            foreach ($mls_query_filter as $filter)
            {
                if($filter['field'] == 'price'){
                    $query .= '(' .$maps['system_price'] . '=' . $filter['value'] .'+)';
                }
                elseif ($filter['field'] === 'date' && $number_of_days == null && $number_of_days < 0)
                {
                    $date = Carbon::parse($filter['value'])->toAtomString();
                    if($query != '')
                    {
                        $query .= ',(' .$maps[$filter['field']] . '=' . $date .'+)';
                    }else {
                        $query .= '(' .$maps[$filter['field']] . '=' . $date .'+)';
                    }
                }
                else{
                    if($query != '')
                    {
                        $query .= ',(' .$maps[$filter['field']] . '=' . $filter['value'] .')';
                    } else {
                        $query .= '(' .$maps[$filter['field']] . '=' . $filter['value'] .')';
                    }

                }
            }
        }
        if($picture){
            if($query != '')
            {
                $query .= ',(' .$maps['picture_count'] . '=' .'0+)';
            } else {
                $query .= '(' .$maps['picture_count'] . '=' .'0+)';
            }

        }
        if($number_of_days != '' && $number_of_days != null && $number_of_days > 0)
        {
            $date = Carbon::now()->subDays($number_of_days)->toAtomString();
            if($query != '')
            {
                $query .= ',(' .$maps['input_date'] . '=' . $date .'+)';
            }else {
                $query .= '(' .$maps['input_date'] . '=' . $date .'+)';
            }
        }
        return ['query' => $query,'limit' => $limit];
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getMlsDataMap($id)
    {
        $mls_data_map = MlsDataMap::select('resource','class','maps','additional')
            ->where('mls_user_id',$id)->where('status','1')->get(); //get active property
        return $mls_data_map;
    }

    /**
     * @param $result
     * @param $maps
     * @param $additional
     * @return array
     */
    public function mapData($result, $maps, $additional)
    {
        $listing_data = [];
        $additional_fields = [];
        $result = $result->toArray();
        foreach ($maps as $map_key => $map)
        {
            if(isset($result[$map]))
            {
                $listing_data[$map_key] = $result[$map];
            }
        }
        $listing_data['additional_fields'] = json_encode($additional_fields);
        return $listing_data;
    }

    /**
     * @param $class
     * @param $resource
     * @param $id
     * @param $listing_data
     * @return mixed
     */
    public function getDataRemaps($class, $resource, $id, $listing_data)
    {
        $data_remaps = MlsDataRemap::where('class',$class)
            ->where('resource',$resource)
            ->where('mls_user_id',$id)
            ->get();
        foreach ($data_remaps as $data_remap)
        {
            if(isset($listing_data[$data_remap->remap_key])){
                $remaps = json_decode($data_remap->remaps,true);
                if(!empty($remaps) && array_key_exists($listing_data[$data_remap->remap_key],$remaps)){
                    $listing_data[$data_remap->remap_key] = $remaps[$listing_data[$data_remap->remap_key]];
                }
            }
        }
        return $listing_data;
    }

    /**
     * @param $listing_data
     * @return mixed
     */
    public function changeToInt($listing_data)
    {
        $listing_integer = config('mls.columns.integer');
        foreach ($listing_integer as $column)
        {
            if(isset($listing_data[$column])){
                $listing_data[$column] = (int) $listing_data[$column];
            }
        }
        return $listing_data;
    }

    /**
     * @param $listing_data
     * @return array
     */
    public function generateListingData($listing_data)
    {
        $listing_fillable = config('mls.columns.listings');
        $listing = [];
        foreach ($listing_fillable as $fillable)
        {
            if(isset($listing_data[$fillable])){
                $listing[$fillable] = $listing_data[$fillable];
            }
        }
        $listing['listing_name'] = $listing['address_number'] . ' ' .
                                   $listing['address_street'] . ' ' .
                                   $listing['city'] . ' ' .
                                   $listing['zip'];
        $listing['listing_slug'] = str_slug($listing['listing_name']);
        return $listing;
    }

    /**
     * @param $listing_data
     * @return array
     */
    public function generateListingDetailsData($listing_data)
    {
        $listing_detail_fillable = config('mls.columns.listing_details');
        $listing_details = [];
        foreach ($listing_detail_fillable as $fillable)
        {
            if(isset($listing_data[$fillable])){
                $listing_details[$fillable] = $listing_data[$fillable];
            }
        }
        return $listing_details;
    }

    /**
     * @param $rets
     */
    public function getImages($rets)
    {
        $image_type = 'Photo';
        $format = 1;
        $listingArrChunked = Listing::query()
             ->leftJoin('listing_images', function ($join) {
                $join->on('listing_images.listing_id', '=', 'listings.uid');
            })
            ->whereNull('listing_images.id')
            ->select(['listings.id', 'listings.uid', 'listings.status'])
            ->orderBy('input_date', 'DESC')
            ->get()
            ->chunk(10);
        foreach ($listingArrChunked as $listingArr) {
            $ui_id_arr = $listingArr->pluck('uid')->toArray();
            $query = implode(',', $ui_id_arr);

            $objects = $rets->GetObject('Property', $image_type, $query, '*', $format);
            foreach ($objects as $object)
            {
              try{
                  $listing_url = '/media/images/image-not-found.png';
                  if($format = 1)
                  {
                      $listing_url = $object->getLocation();
                  } else {
                      $encoded_image = $object->getContent();
                      $file_path = '/media/images/' . $object->getContentId() . '-' .$object->getObjectId().'.jpg';
                      $absolute_path = storage_path() . $file_path;
                      file_put_contents($absolute_path,$encoded_image);
                      $listing_url = $file_path;
                  }
                  $data = [
                      'listing_id' => $object->getContentId(),
                      'image_id' => $object->getObjectId() ,
                      'type' => $object->getContentType(),
                      'listing_url' => $listing_url
                  ];
                  Log::info($data);
                  ListingImages::updateOrCreate(['listing_id' => $data['listing_id'],'image_id'=>$data['image_id']],$data);
              }
              catch(\Exception $er){
                  Log::info($er);
              }
            }
        }
    }
}