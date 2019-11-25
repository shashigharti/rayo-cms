<?php
namespace Robust\RealEstate\Controllers\Website;


use App\Http\Controllers\Controller;
use Robust\Core\Helpage\Site;
use Robust\RealEstate\Repositories\Website\ListingRepository;


class ListingController extends Controller
{

    protected $model;


    public function __construct(ListingRepository $model)
    {
        $this->model = $model;
    }


    public function index()
    {
        $results = $this->model->getListing()->paginate(40);
        $total = $this->model->getListing()->count();
        return view(Site::templateResolver('real-estate::website.listings.index'),['results'=>$results,'total'=>$total]);
    }

    public function active()
    {
        $results = $this->model->getListing('Active')->paginate(40);
        $total = $this->model->getListing('Active')->count();
        return view(Site::templateResolver('real-estate::website.listings.index'),['results'=>$results,'total'=>$total]);
    }

    public function sold()
    {
        $results = $this->model->getListing('Sold')->paginate(40);
        $total = $this->model->getListing('Sold')->count();
        return view(Site::templateResolver('real-estate::website.listings.index'),['results'=>$results,'total'=>$total]);
    }

    public function single($id,$slug)
    {
        $result = $this->model->getSingle($id);
        return view(Site::templateResolver('real-estate::website.listings.single'),['result'=>$result]);
    }
}
