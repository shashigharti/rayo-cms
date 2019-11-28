<?php
namespace Robust\RealEstate\Controllers\Website;


use App\Http\Controllers\Controller;
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
        $total = $this->model->getListing()->count();
        return view(Site::templateResolver('real-estate::website.listings.index'),['results'=>$results,'total'=>$total]);
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

    public function search($slug, $type){

        dd($slug, $type);

    }
}
