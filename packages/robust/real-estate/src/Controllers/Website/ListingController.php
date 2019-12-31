<?php
namespace Robust\RealEstate\Controllers\Website;


use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Robust\Core\Helpage\Site;
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
    public function active($location_type = null,  $location = null,  $price_range = [])
    {
        $query_params = request()->all();
        $results  = $this->model->getListings(
            [
                'status' => 'Active'
            ])
            ->whereLocation([ $location_type => $location ])
            ->wherePriceBetween($price_range != null? explode('-', $price_range) : $price_range)
            ->with('property')
            ->with('images')
            ->paginate(40);
        return view(Site::templateResolver('real-estate::website.listings.index'), ['results'=>$results]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sold($location_type = null,  $location = null,  $price_range = [])
    {
        $query_params = request()->all();
        $data_timeframe = config('rws.data.timeframe');
        $results  = $this->model->getListings(
            [
                'status' => 'Closed' // this should be configurable.
            ])
            ->whereLocation([ $location_type => $location ])
            ->wherePriceBetween($price_range != null? explode('-', $price_range) : $price_range)
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

    /**
     * @param $location_type
     * @param $location
     * @param $price_range
     * @param $sub_area
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subArea($location_type, $location, $price_range, $sub_area)
    {

        $query_params = request()->all();
        $results  = $this->model->getListings(
            [
                'status' => 'Active'
            ])
            ->whereLocation([ $location_type => $location ])
            ->wherePriceBetween($price_range != null? explode('-', $price_range) : [])
            ->whereSubArea($sub_area)
            ->with('property')
            ->with('images')
            ->paginate(40);
        return view(Site::templateResolver('real-estate::website.listings.index'), [ 'results' => $results ]);
    }

    /**
     * @param $slug
     * @return array|string
     * @throws \Throwable
     */
    public function print($slug)
    {
        $result = $this->model->getSingle($slug);
        $html = view('real-estate::website.frontpage.partials.print',['result'=>$result])->render();
        return PDF::loadHTML($html)->setPaper('a4', 'portrait')
            ->setWarnings(false)->stream( $result->name .'.pdf');
    }

}
