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
    public function active(LocationHelper $locationHelper, $location_type = null, $location = null)
    {
        $status = settings('real-estate', 'active');
        $qBuilder = $this->model->getListings(
            [
                'status' => $status
            ]);
        if ($location_type != null) {
            $qBuilder = $qBuilder->whereLocation([$location_type => $location]);
        }

        $results = $qBuilder->with('property')
            ->with('images')
            ->paginate($this->pagination);

        return view(Site::templateResolver('core::website.listings.index'), [
            'results' => $results,
            'location' => ($location) ? $locationHelper->getLocation($location) : null
        ]);
    }


    /**
     * @param LocationHelper $locationHelper
     * @param $banner_slug
     * @param $price_range
     * @param null $tab_type
     * @param null $tab_slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCustomListingsForBanner(LocationHelper $locationHelper,
                                               $banner_slug, $price_range, $tab_type = null, $tab_slug = null)
    {
        $qBuilder = $this->model->processBannerParams($banner_slug, $tab_type = null, $tab_slug = null);
        $location = null;

        $results = $qBuilder
            ->wherePriceBetween($price_range != null ? explode('-', $price_range) : $price_range)
            ->with('property')
            ->with('images')
            ->paginate($this->pagination);

        return view(Site::templateResolver('core::website.listings.index'), [
            'results' => $results,
            'location' => ($location) ? $locationHelper->getLocation($location) : null
        ]);
    }

    /**
     * @param LocationHelper $locationHelper
     * @param $banner_slug
     * @param null $tab_type
     * @param null $tab_slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCustomListingsForTabsWithoutPrice(LocationHelper $locationHelper,
                                                         $banner_slug, $tab_type = null,
                                                         $tab_slug = null)
    {
        $qBuilder = $this->model->processBannerParams($banner_slug);
        $location = null;

        // Process conditions for tabs
        $qBuilder = $qBuilder->getTabsQuery($tab_type, $tab_slug);

        $results = $qBuilder
            ->with('property')
            ->with('images')
            ->paginate($this->pagination);

        return view(Site::templateResolver('core::website.listings.index'), [
            'results' => $results,
            'location' => ($location) ? $locationHelper->getLocation($location) : null
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
        $qBuilder = $this->model->getListings(
            [
                'status' => $status
            ]);

        if ($location_type != null) {
            $qBuilder = $qBuilder->whereLocation([$location_type => $location]);
        }

        $results = $qBuilder->wherePriceBetween($price_range != null ? explode('-', $price_range) : $price_range)
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
