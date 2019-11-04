<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Robust\RealEstate\Helpers\MlsPullHelper;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\ListingDetail;
use Robust\RealEstate\Models\MlsLog;
use Robust\RealEstate\Models\MlsUser;

/**
 * Class MlsPullData
 * @package Robust\Mls\Console\Commands
 */
class MlsPullData extends Command
{
    /**
     * @var string
     */
    protected $signature = 'mls:pull-data {id}';

    /**
     * @var string
     */
    protected $description = 'Runs to generate mls resource & class mapping';

    /**
     * MlsPullData constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param MlsPullHelper $mlsPullHelper
     * @throws \PHRETS\Exceptions\CapabilityUnavailable
     * @throws \PHRETS\Exceptions\MissingConfiguration
     */
    public function handle(MlsPullHelper $mlsPullHelper)
    {

        $id = $this->argument('id');
        $mls_user = MlsUser::where('id',$id)->first();
        $login_url = $mls_user->login_url;
        $username = $mls_user->username;
        $password = $mls_user->password;
        if($login_url && $username && $password){
            $config =  new \PHRETS\Configuration;
            $config->setLoginUrl($login_url);
            $config->setUsername($username);
            $config->setPassword($password);
            $config->setRetsVersion('1.7.2');
            $config->setOption('use_post_method', true);
            $rets = new \PHRETS\Session($config);

            $connect = $rets->login();
            $mls_data_map = $mlsPullHelper->getMlsDataMap($id);
            foreach ($mls_data_map as $property)
            {
                $mls_query = $mlsPullHelper->getFilteredQuery($id,$property);
                $query = $mls_query['query'];
                $limit = $mls_query['limit'];
                $listing_count = 0;
                $resource = $property->resource; //use resource
                $class = $property->class; //use class
                $log_id = $mlsPullHelper->createLog($id,$class,$resource,$limit);
                $columns = $mlsPullHelper->getSelectColumns($property);
                $maps = json_decode($property->maps,true); //maps to array
                $status = 'Done';
                $results = $rets->search($resource,$class,!empty($query) ? $query : '*',['Limit'=>$limit,'Select'=>'']); //query the server
                $total = $results->getTotalResultsCount();
                $offset = 0;
                $additional = json_decode($property->additional,true); // mapping additional data

                try{
                    do{
                        $results = $rets->search($resource,$class,!empty($query) ? $query : '*',['Limit'=>$limit,'Select'=>$columns,'Offset'=>$offset * $limit]);
                        foreach ($results as $result){
                            $listing_data = $mlsPullHelper->mapData($result,$maps,$additional);
                            $listing_data = $mlsPullHelper->getDataRemaps($class,$resource,$id,$listing_data);
                            $listing_data =$mlsPullHelper->changeToInt($listing_data);
                            $listing = $mlsPullHelper->generateListingData($listing_data);
                            $listing_details = $mlsPullHelper->generateListingDetailsData($listing_data);
                            $listing_id = Listing::updateOrCreate(['uid'=>$listing['uid']],$listing)->id;
                            Log::info($listing);
                            $listing_details['listing_id'] = $listing_id;
                            Log::info($listing_details);
                            ListingDetail::updateOrCreate(['listing_id'=>$listing_id],$listing_details);
                            $listing_count +=1;
                            $this->info($listing_count. ' || '. $total . ' || ' . $listing['uid']);
                        }
                        $offset+=1;
                    } while ($listing_count != $total);
                }
                catch (\Exception $error)
                {
                    $status = 'Failed';
                    MlsLog::query()->where('id',$log_id)->update(['exception_error' => $error->getMessage()]);
                    Log::info($error->getMessage());
                }
                finally{
                    MlsLog::query()->where('id',$log_id)->update(['data_count' => $listing_count,'status' => $status]);
                }
            }
//            $mlsPullHelper->getImages($rets);
        }
    }
}
