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
    public function active($location_type = null,  $location = null,  $price_range = null)
    {        
        $query_params = request()->all();
        $results  = $this->model->getListings(
            [
                'status' => 'Active'          
            ])
            ->whereLocation([ $location_type => $location ])
            ->wherePriceBetween(['system_price' => $price_range != null? explode('-', $price_range) : $price_range ])
            ->paginate(40);
        return view(Site::templateResolver('real-estate::website.listings.index'), ['results'=>$results]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sold($location_type = null,  $location = null,  $price_range = null)
    {        
        $query_params = request()->all();
        $results  = $this->model->getListings(
            [
                'status' => 'Closed'                            
            ])
            ->whereLocation([ $location_type => $location ])
            ->wherePriceBetween(['system_price' => $price_range != null? explode('-', $price_range) : $price_range ])
            ->paginate(40);
        return view(Site::templateResolver('real-estate::website.listings.index'), [ 'results' => $results ]);
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

    // /**
    //  * @param $type
    //  * @param $value
    //  * @param $id
    //  * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    //  */
    // public function getSimilarProperty($type, $value, $id)
    // {
    //     $price = $this->model->find($id)->system_price;
    //     $results = $this->model->getCountByType($type,$value)
    //             ->where('system_price', '>' ,$price - 50000)
    //             ->where('system_price', '<', $price + 50000)
    //             ->paginate(40);
    //     return view(Site::templateResolver('real-estate::website.listings.index'),['results'=>$results]);
    // }
}
