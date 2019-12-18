<?php
namespace Robust\RealEstate\Controllers\Website;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\Core\Helpage\Site;
use Robust\RealEstate\Models\ListingProperty;
use Robust\RealEstate\Repositories\Website\ListingRepository;


/**
 * Class ListingController
 * @package Robust\RealEstate\Controllers\Website
 */
class ListingController extends Controller
{

    /**
     * @var ListingRepository
     */
    protected $model;


    /**
     * ListingController constructor.
     * @param ListingRepository $model
     */
    public function __construct(ListingRepository $model)
    {
        $this->model = $model;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function active($location_type = null,  $location = null,  $price_range = null)
    {
        $query_params = request()->all();
        $results  = $this->model->getListings(
            [
                'status' => 'Active'
            ])
            ->whereLocation([ $location_type => $location ])
            ->wherePriceBetween(['system_price' => $price_range != null? explode('-', $price_range) : $price_range ])
            ->with('property')
            ->with('images')
            ->paginate(40);
        return view(Site::templateResolver('real-estate::website.listings.index'), ['results'=>$results]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sold($location_type = null,  $location = null,  $price_range = null)
    {
        $query_params = request()->all();
        $data_timeframe = config('rws.data.data-timeframe');
        $results  = $this->model->getListings(
            [
                'status' => 'Closed'
            ])
            ->whereLocation([ $location_type => $location ])
            ->wherePriceBetween(['system_price' => $price_range != null? explode('-', $price_range) : $price_range ])
            ->whereDateBetween([date('Y-m-d', strtotime($data_timeframe)), date('Y-m-d')])
            ->with('property')
            ->with('images')
            ->paginate(40);
        return view(Site::templateResolver('real-estate::website.listings.index'), [ 'results' => $results ]);
    }

    /**
     * @param $id
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function single($slug)
    {
        $result = $this->model->getSingle($slug);
        return view(Site::templateResolver('real-estate::website.listings.single'),['result'=>$result]);
    }

    /**
     * @param $type
     * @param $value
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSimilarProperty($type, $value, $id)
    {
        $price = $this->model->find($id)->system_price;
        $results = $this->model->getCountByType($type,$value)
                ->where('system_price', '>' ,$price - 50000)
                ->where('system_price', '<', $price + 50000)
                ->paginate(40);
        return view(Site::templateResolver('real-estate::website.listings.index'),['results'=>$results]);
    }

    public function subArea($location_type, $location,$price_range,$sub_area)
    {

        $query_params = request()->all();
        $results  = $this->model->getListings(
            [
                'status' => 'Active'
            ])
            ->whereLocation([ $location_type => $location ])
            ->wherePriceBetween(['system_price' => $price_range != null? explode('-', $price_range) : $price_range ])
            ->whereSubArea($sub_area)
            ->with('property')
            ->with('images')
            ->paginate(40);
        return view(Site::templateResolver('real-estate::website.listings.index'), [ 'results' => $results ]);
    }

    public function mapData(Request $request)
    {
        $data = $request->all();
        $ids = explode(',',$data['ids']);
        $properties = ListingProperty::select('listing_id','type','value')
                ->whereIn('listing_id',$ids)
                ->whereIn('type',['latitude','longitude'])
                ->get();
        $result = [];
        foreach ($properties as $property)
        {
            $result[$property->listing_id][$property->type] = $property->value;
        }
        return response()->json(['data'=>$result]);
    }
}
