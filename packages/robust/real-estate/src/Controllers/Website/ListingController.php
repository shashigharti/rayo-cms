<?php

namespace Robust\RealEstate\Controllers\Website;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Robust\Core\Helpage\Site;
use Robust\RealEstate\Events\LeadSearchEvent;
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
     * @var array
     */
    protected $events;
    /**
     * @var false|int
     */
    private $data_age;

    /**
     * ListingController constructor.
     * @param ListingRepository $model
     */
    public function __construct(ListingRepository $model)
    {
        $this->model = $model;
        $this->pagination = settings('app-setting')['pagination'] ?? 20;
        $this->events = [
            'single_listing_viewed' => 'Robust\RealEstate\Events\SingleListingPageEvent',
            'user_activity' => 'Robust\Admin\Events\UserActivityEvent'
        ];
        $this->data_age = date('Y-m-d',strtotime(date('Y-m-d') . ' -'. settings('real-estate','data_age') . ' days'));
    }


    /**
     * @param LocationHelper $locationHelper
     * @param null $location_type
     * @param null $location
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function active(LocationHelper $locationHelper, $location_type = null, $location = null)
    {
        $settings = settings('real-estate');
        $qBuilder = $this->model->getListings(
            [
                'status' => $settings['active']
            ]);
        if ($location_type != null) {
            $qBuilder = $qBuilder->whereLocation([$location_type => $location]);
        }
        $results = $qBuilder
            ->whereDateBetween([$this->data_age, date('Y-m-d')])
            ->with('property')
            ->with('images')
            ->paginate($this->pagination);
        $params = request()->all();
        $lead = isLead();
        if($lead && !empty($params)){
            event(new LeadSearchEvent($lead,json_encode($params)));
        }
        return view(Site::templateResolver('core::website.listings.index'), [
            'results' => $results,
            'location' => ($location) ? $locationHelper->getLocation($location) : null
        ]);
    }


    /**
     * @param BannerRepository $banner
     * @param LocationHelper $locationHelper
     * @param $banner_slug
     * @param $price_range
     * @param null $tab_type
     * @param null $tab_slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCustomListingsForBanner(BannerRepository $banner, LocationHelper $locationHelper,
                                               $banner_slug, $price_range, $tab_type = null, $tab_slug = null)
    {
        $settings = settings('real-estate');
        $banner = $banner->where('slug', $banner_slug)->first();
        $qBuilder = $this->model->processBannerParams($banner, $tab_type, $tab_slug);
        $location = null;
        $title = null;

        if ($tab_type !== null) {
            $tab_slug = str_replace('-', '_', $tab_slug);
            $properties = json_decode($banner->properties);
            $title = $properties->tabs->{$tab_slug}->page_title;
        }

        $results = $qBuilder
            ->wherePriceBetween($price_range != null ? explode('-', $price_range) : $price_range)
            ->whereDateBetween([$this->data_age, date('Y-m-d')])
            ->with('property')
            ->with('images')
            ->paginate($this->pagination);

        return view(Site::templateResolver('core::website.listings.index'), [
            'results' => $results,
            'title' => $title,
            'location' => ($location) ? $locationHelper->getLocation($location) : null
        ]);
    }


    /**
     * @param BannerHelper $banner
     * @param LocationHelper $locationHelper
     * @param $banner_slug
     * @param null $tab_type
     * @param null $tab_slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCustomListingsForTabsWithoutPrice(BannerRepository $banner, LocationHelper $locationHelper,
                                                         $banner_slug, $tab_type, $tab_slug, $location_slug)
    {
        $settings = settings('real-estate');
        $banner = $banner->where('slug', $banner_slug)->first();
        $qBuilder = $this->model->processBannerParams($banner);
        $location = null;
        $title = null;

        if ($tab_type !== '') {
            $tab_slug = str_replace('-', '_', $tab_slug);
            $properties = json_decode($banner->properties);
            $title = $properties->tabs->{$tab_slug}->display_name;
        }

        // Process conditions for tabs
        $qBuilder = $qBuilder->getTabsQuery($tab_type, $location_slug);
        $results = $qBuilder
            ->whereDateBetween([$this->data_age, date('Y-m-d')])
            ->with('property')
            ->with('images')
            ->paginate($this->pagination);

        return view(Site::templateResolver('core::website.listings.index'), [
            'results' => $results,
            'title' => $title,
            'location' => ($location) ? $locationHelper->getLocation($location) : null
        ]);
    }


    /**
     * @param LocationHelper $locationHelper
     * @param null $location_type
     * @param null $location
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sold(LocationHelper $locationHelper, $location_type = null, $location = null)
    {
        $settings = settings('real-estate');
        $qBuilder = $this->model->getListings(
            [
                'status' => $settings['sold']
            ]);

        if ($location_type != null) {
            $qBuilder = $qBuilder->whereLocation([$location_type => $location]);
        }

        $results = $qBuilder
            ->whereDateBetween([$this->data_age, date('Y-m-d')])
            ->with('property')
            ->with('images')
            ->paginate($this->pagination);
        return view(Site::templateResolver('core::website.listings.index'), [
            'results' => $results,
            'location' => ($location != null) ? $locationHelper->getLocation($location) : null
        ]);
    }

    /**
     * @param $id
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function single($slug)
    {
        $result = $this->model->getSingle($slug);
        $similars = $this->model->where('city_id',$result->city_id)
               ->where('status',settings('real-estate','active'))
               ->wherePriceBetween([$result->system_price-30000,$result->system_price + 30000])
               ->where('id',$result->id,'!=')
               ->limit(4)
               ->get();
        if(\Auth::check()){
           event(new $this->events['user_activity'](\Auth::user(),'Listing Viewed',url()->current(),''));
           event(new $this->events['single_listing_viewed'](\Auth::user(),$result));
        }
        return view(Site::templateResolver('core::website.listings.single'), ['result' => $result,'similars' => $similars]);
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
