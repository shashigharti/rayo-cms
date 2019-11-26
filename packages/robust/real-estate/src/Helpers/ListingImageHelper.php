<?php
namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Repositories\Website\ListingImageRepository;

/**
 * Class ListingImageHelper
 * @package Robust\RealEstate\Helpers
 */
class ListingImageHelper
{
    /**
     * @var ListingImageRepository
     */
    protected $model;
    /**
     *
     */
    protected CONST DEFAULT_IMAGE_LINK = '/images/image-not-found.png';

    /**
     * ListingImageHelper constructor.
     * @param ListingImageRepository $model
     */
    public function __construct(ListingImageRepository $model)
    {
        $this->model = $model;
    }

    /**
     * @param $uid
     * @return string
     */
    public function getSingleImage($uid)
    {
        $image = $this->model->select('listing_url')->where('listing_id',$uid)->first();
        if($image){
            return $image->listing_url;
        }
        return ListingImageHelper::DEFAULT_IMAGE_LINK;
    }
}
