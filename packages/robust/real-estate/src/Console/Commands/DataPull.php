<?php


namespace Robust\RealEstate\Console\Commands;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\ListingImages;

/**
 * Class DataPull
 * @package Robust\RealEstate\Console\Commands
 */
class DataPull extends Command
{
    /**
     * @var string
     */
    protected $signature = 'rws:data-pull';

    /**
     * @var string
     */
    protected $description = 'Pull Data from server';

    /**
     * DataPull constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @var array
     */
    protected $property_class = [
        'A' => 'Residential Property',
        'B' => 'MultiFamily',
        'C' => 'LotsAndLand',
        'D' => 'CommonInterest',
        'E' => 'Industry',
        'F' => 'Rental',
    ];
    /**
     * @var array
     */
    protected $integer_fields = [
        'total_finished_area',
        'system_price',
        'picture_count',
        'year_built',
        'bedrooms',
        'baths_full',
        'days_on_mls'
    ];
    /**
     * @var int
     */
    protected $limit = 1; //how much data we get in single call

    /**
     * @throws \PHRETS\Exceptions\CapabilityUnavailable
     * @throws \PHRETS\Exceptions\MissingConfiguration
     */
    public function handle()
    {
        //using package troydavisson/phrets https://github.com/troydavisson/PHRETS
        $url = 'http://retsgw.flexmls.com:80/rets2_3/Login';
        $username = 'fl.rets.802025';
        $password = 'scopa-tropy71';
        $config = new \PHRETS\Configuration;
        $config->setLoginUrl($url)
            ->setUsername($username)
            ->setPassword($password)
            ->setRetsVersion('1.7.2');

        $rets = new \PHRETS\Session($config);
        $connect = $rets->Login();
        $resources = config('real-estate.data-map.property');
        foreach ($resources as $class => $resource)
        {
            $processed = 0;
            $created = 0;
            $updated = 0;
            $total = 0;
            $offset = 0;
            $fields = implode(',',array_values($resource));
            $date = Carbon::now()->subDay(100)->toAtomString(); //only accepts atom format
            dump($date);
            $query = '*'; //this is for accepting all data with out any condition

            $query = '(LIST_132='.$date .'+)'; // this is according to input date
            $results = $rets->Search('Property',$class,$query,['Limit' =>1,'Select' => $fields]);

            $total = $results->getTotalResultsCount();
            do {
                $results = $rets->Search('Property',$class,$query,['Limit' =>$this->limit,'Select' => $fields,'Offset' => $offset]);
                $offset+=1;
                foreach ($results as $result){
                    $data = [];
                    $result = $result->toArray(); //change to array format
                    foreach ($resource as $key => $field)
                    {
                        if(isset($result[$field])){
                            $data[$key] = $result[$field];
                        }
                    }
                    //now we have raw data needs to change some format like to integer or class names
                    $data['class'] = $this->changePropertyClass($data['class']);
                    foreach ($this->integer_fields as $field){
                        if(isset($data[$field])){
                            $data[$field] = $this->changeToInt($data[$field]);
                        }
                    }
                    $listing = Listing::updateOrCreate(['server_listing_id' => $data['server_listing_id']],$data);
                    if($listing->wasChanged()){
                        $updated+=1;
                    }
                    if($listing->wasRecentlyCreated){
                        $created+=1;
                    }
                    //we can pull images in another command accesing uid
                    $images = $rets->GetObject('Property','HiRes',$listing->uid,"*",1 );
                    if(!$images->isEmpty()){
                        foreach ($images as $image){
                            $data = [];
                            $data = [
                                'listing_id' => $image->getContentId(),
                                'image_id' => $image->getObjectId(),
                                'listing_url' => $image->getLocation(),
                                'type' => $image->getContentType()
                            ];
                            ListingImages::updateOrCreate([
                                'listing_id' => $image->getContentId(),
                                'image_id' => $image->getObjectId()
                            ],$data);
                        }
                    }

                    $processed+=1;
                    $info = 'Total count : ' .$total .' || ' .
                        'Updated Count : ' .$updated .' || ' .
                        'Created Count : ' .$created . '||
                     Resource : Property || Class : '.$class . ' || Total Images : ' . count($images);
                    $this->info($info);
                }
            } while($processed != $total);
        }


    }

    /**
     * @param $data
     * @return mixed
     */
    public function changePropertyClass($data)
    {
        return $this->property_class[$data];
    }

    /**
     * @param $data
     * @return int
     */
    public function changeToInt($data)
    {
        return (int) $data;
    }
}
