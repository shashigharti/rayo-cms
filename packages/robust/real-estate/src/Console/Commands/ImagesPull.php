<?php


namespace Robust\RealEstate\Console\Commands;
use Illuminate\Support\Str;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\ListingImages;
use Robust\RealEstate\Models\ListingProperty;


class ImagesPull extends RetsCommands
{
    /**
     * @var string
     */
    protected $signature = 'rws:images-pull';

    /**
     * @var string
     */
    protected $description = 'Pull Images from server';


    /**
     * FieldsPull constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected $limit = 50;

    public function handle()
    {
        Listing::select('id','uid')
            ->where('picture_status',0)
            ->orderBy('id')
            ->chunk($this->limit,function ($listings){
                $images_array = [];
                $listing_ids = $listings->pluck('id','uid')->toArray();
                foreach ($listing_ids as $uid => $id){
                    $images_array[$id] = [];
                }
                $query = implode(',',array_flip($listing_ids));
                $images = $this->rets->GetObject('Property','HiRes',$query,"*",1 );
                foreach ($images as $image)
                {
                    $data = [
                        'listing_id' => $listing_ids[$image->getContentId()],
                        'image_id' => $image->getObjectId(),
                        'url' => $image->getLocation(),
                        'type' => $image->getContentType()
                    ];
                    array_push($images_array[$data['listing_id']],$data);
                }
                foreach ($images_array as $id => $images)
                {
                    ListingImages::insert($images);
                    Listing::where('id',$id)->update(['picture_status'=>1]);
                    $this->info('Updated images for id : ' . $id);
                }
            });
    }
}
