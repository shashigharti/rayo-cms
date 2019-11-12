<?php


namespace Robust\RealEstate\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Robust\RealEstate\Helpers\MlsPullHelper;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\ListingImages;
use Robust\RealEstate\Models\MlsUser;

class MlsPullImages extends Command
{
    protected $signature = 'mls:pull-images {id}';

    protected $description = '';
    public function __construct()
    {
        parent::__construct();
    }

    public function handle(MlsPullHelper $helper)
    {
        $id = $this->argument('id');
        $mls_user = MlsUser::where('id',$id)->first();
        $login_url = $mls_user->login_url;
        $username = $mls_user->username;
        $password = $mls_user->password;
        if($login_url && $username && $password) {
            $config = new \PHRETS\Configuration;
            $config->setLoginUrl($login_url);
            $config->setUsername($username);
            $config->setPassword($password);
            $config->setRetsVersion('1.7.2');
            $config->setOption('use_post_method', true);
            $rets = new \PHRETS\Session($config);
            $connect = $rets->login();
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
                ->chunk(1000);
            $bar = $this->output->createProgressBar(count($listingArrChunked));
            foreach ($listingArrChunked as $listingArr) {
                $ui_id_arr = $listingArr->pluck('uid')->toArray();
                $listing_status = $listingArr->pluck('status','uid')->toArray();
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
                        if($listing_status[$data['listing_id']] != 'Active'){
                            continue;
                        }
                        $this->info('ID : '.$data['listing_id'] . ' || '.'Status : ' . $listing_status[$data['listing_id']]);
                    }
                    catch(\Exception $er){
                        Log::info($er);
                    }
                }
                $bar->advance();
            }
            $bar->finish();
        }

    }
}
