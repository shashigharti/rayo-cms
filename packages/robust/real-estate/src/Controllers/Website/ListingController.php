<?php
namespace Robust\RealEstate\Controllers\Website;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    public function index()
    {
        $results = $this->model->getListing()->paginate(40);
        return view(Site::templateResolver('real-estate::website.listings.index'),['results'=>$results]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function active()
    {
        $results = $this->model->getListing('Active')->paginate(40);
        $total = $this->model->getListing('Active')->count();
        return view(Site::templateResolver('real-estate::website.listings.index'),['results'=>$results,'total'=>$total]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sold()
    {
        $results = $this->model->getListing('Closed')->paginate(40);
        $total = $this->model->getListing('Closed')->count();
        return view(Site::templateResolver('real-estate::website.listings.index'),['results'=>$results,'total'=>$total]);
    }

    /**
     * @param $id
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function single($id, $slug)
    {
        $result = $this->model->getSingle($id);
        return view(Site::templateResolver('real-estate::website.listings.single'),['result'=>$result]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $data = $request->all();
        if(isset($data['searchType']) && $data['searchType'] == 'search')
        {
            $prices = explode(',',$data['price']);
            $bedrooms = explode(',',$data['bedroom']);
            $bathrooms = explode(',',$data['bathrooms']);
            $data['price_min'] = $prices[0] ?? '0';
            $data['price_max'] = $prices[1] ?? '0';
            $data['beds_min'] = $bedrooms[0] ?? '0';
            $data['beds_max'] = $bedrooms[1] ?? '0';
            $data['bathrooms_min'] = $bathrooms[0] ?? '0';
            $data['bathrooms_max'] = $bathrooms[1] ?? '0';
        }
        $results = $this->model->getListingBySearch($data)->paginate(40);
        return view(Site::templateResolver('real-estate::website.listings.index'),['results'=>$results]);
    }

    /**
     * @param $city
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function byCity($city)
    {
        $results =  $this->model->getListingByType('city',$city,null)->paginate(40);
        $total = $this->model->getListingByType('city',$city,null)->count();
        return view(Site::templateResolver('real-estate::website.listings.index'),['results'=>$results,'total'=>$total]);
    }

    /**
     * @param $city
     * @param $price
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function byCityPrice($city, $price)
    {
        $results =  $this->model->getListingByPrice('city_id',$city,$price)->paginate(40);
        $total = $this->model->getListingByType('city_id',$city,null)->count();
        return view(Site::templateResolver('real-estate::website.listings.index'),['results'=>$results,'total'=>$total]);
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
}
