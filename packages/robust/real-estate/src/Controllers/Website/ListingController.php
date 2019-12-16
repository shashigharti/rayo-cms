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
    public function active()
    {
        $results = [];
        
        $query_params = request()->all();
        if(count($query_params) > 0) {
            $results  = $this->model->getListings();
        }
        return view(Site::templateResolver('real-estate::website.listings.index'),['results'=>$results]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sold()
    {
        $results = $this->model->getListings('Closed');
        $total = count($results);
        return view(Site::templateResolver('real-estate::website.listings.index'),
        ['results'=>$results,'total' => $total]);
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
