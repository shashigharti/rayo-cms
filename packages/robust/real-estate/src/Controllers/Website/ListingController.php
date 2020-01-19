<?php

namespace Robust\RealEstate\Controllers\Website;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Robust\Core\Helpage\Site;
use Robust\RealEstate\Repositories\Website\BannerRepository;
use Robust\RealEstate\Repositories\Website\ListingRepository;
use Robust\RealEstate\Helpers\LocationHelper;

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
     * @var int
     */
    protected $pagination;


    /**
     * ListingController constructor.
     * @param ListingRepository $model
     */
    public function __construct(ListingRepository $model)
    {
        $this->model = $model;
        $this->pagination = settings('app-setting')['pagination'] ?? 20;
    }


    /**
     * @param LocationHelper $locationHelper
     * @param null $location_type
     * @param null $location
     * @param array $price_range
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function active(LocationHelper $locationHelper, $location_type = null, $location = null, $price_range = [])
    {
        $status = settings('real-estate', 'active');
        $results = $this->model->getListings(
            [
                'status' => $status
            ])
            ->whereLocation([$location_type => $location])
            ->wherePriceBetween($price_range != null ? explode('-', $price_range) : $price_range)
            ->with('property')
            ->with('images')
            ->paginate($this->pagination);

        return view(Site::templateResolver('core::website.listings.index'), [
            'results' => $results,
            'location' => ($location) ? $locationHelper->getLocation($location) : null
        ]);
    }


    public function customActive(BannerRepository $banner, LocationHelper $locationHelper, $slug, $price_range)
    {
        $location = null;

        $banner = $banner->where('slug', $slug)->first();
        $properties = json_decode($banner->properties);
        $locations_count = count((array)$properties->locations);
        $attributes_count = count((array)$properties->attributes);

        $status = settings('real-estate', 'active');
        $qBuilder = $this->model->getListings(
            [
                'status' => $status
            ]);

        if ($locations_count > 0) {
            //$qBuilder = $qBuilder->whereLocations([$location_type => $location]);
        }

        if ($attributes_count > 0) {
            //$qBuilder = $qBuilder;
        }
        $results = $qBuilder
            ->wherePriceBetween($price_range != null ? explode('-', $price_range) : $price_range)
            ->with('property')
            ->with('images')
            ->paginate($this->pagination);

        return view(Site::templateResolver('core::website.listings.index'), [
            'results' => $results,
            'location' => ($location) ? $locationHelper->getLocation($location): null
        ]);
    }


    /**
     * @param LocationHelper $locationHelper
     * @param null $location_type
     * @param null $location
     * @param array $price_range
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sold(LocationHelper $locationHelper, $location_type = null, $location = null, $price_range = [])
    {
        $status = settings('real-estate', 'sold');
        $data_timeframe = config('rws.data.timeframe');
        $results = $this->model->getListings(
            [
                'status' => $status
            ])
            ->whereLocation([$location_type => $location])
            ->wherePriceBetween($price_range != null ? explode('-', $price_range) : $price_range)
            ->whereDateBetween([date('Y-m-d', strtotime($data_timeframe)), date('Y-m-d')])
            ->with('property')
            ->with('images')
            ->paginate($this->pagination);

        return view(Site::templateResolver('core::website.listings.index'), [
            'results' => $results,
            'location' => ($location != null) ? $locationHelper->getLocation($location) : null
        ]);
    }


    /**
     * @param $status
     * @param $property_type
     * @param $property_values
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getListingsByPropertyType($status, $property_type, $property_value)
    {
        $property_types = isset($property_type) ? explode(',', $property_type) : null;
        $property_values = isset($property_value) ? explode(',', $property_value) : null;
        $results = $this->model->getListings()
            ->wherePropertyType($property_types, $property_values)
            ->paginate($this->pagination);
        return view(Site::templateResolver('core::website.listings.index'), ['results' => $results]);
    }

    /**
     * @param $id
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function single($slug)
    {
        $result = $this->model->getSingle($slug);
        return view(Site::templateResolver('core::website.listings.single'), ['result' => $result]);
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
        $results = $this->model->getCountByType($type, $value)
            ->where('system_price', '>', $price - 50000)
            ->where('system_price', '<', $price + 50000)
            ->paginate($this->pagination);
        return view(Site::templateResolver('core::website.listings.index'), ['results' => $results]);
    }

    /**
     * @param $location_type
     * @param $location
     * @param $price_range
     * @param $sub_area
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subArea($location_type, $location, $price_range, $sub_area)
    {
        $results = $this->model->getListings(
            [
                'status' => 'Active'
            ])
            ->whereLocation([$location_type => $location])
            ->wherePriceBetween($price_range != null ? explode('-', $price_range) : [])
            ->whereSubArea($sub_area)
            ->with('property')
            ->with('images')
            ->paginate($this->pagination);
        return view(Site::templateResolver('core::website.listings.index'), ['results' => $results]);
    }

    /**
     * @param $slug
     * @return array|string
     * @throws \Throwable
     */
    public function print($slug)
    {
        $result = $this->model->getSingle($slug);
        $html = view('core::website.layouts.partials.print', ['result' => $result])->render();
        return PDF::loadHTML($html)->setPaper('a4', 'portrait')
            ->setWarnings(false)->stream($result->name . '.pdf');
    }

}
