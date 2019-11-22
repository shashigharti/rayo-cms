<?php

namespace App\Http\Controllers;

use App\Listing;
use Robust\Core\Helpage\Site;

class ListingController extends Controller
{
    protected $model;
    public function __construct(Listing $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $model  = $this->model->where('picture_count','>',0)
            ->select('id','system_price','picture_count','status','address_street','state','city','county','year_built','total_finished_area','baths_full','bedrooms')
            ->orderBy('input_date')
            ->has('image','>',0);
        $total = $model->count();
        $results = $this->model->with('image')
                ->paginate(40);
        return view(Site::templateResolver('core::website.listings.index'),['results'=>$results,'total'=>$total]);
    }

    public function active()
    {
        $model  = $this->model->where('picture_count','>',0)
            ->where('status','Active')
            ->select('id','system_price','picture_count','status','address_street','state','city','county','year_built','total_finished_area','baths_full','bedrooms')
            ->orderBy('input_date')
            ->has('image','>',0);
        $total = $this->model->count();
        $results = $model->with('image')
            ->paginate(40);
        return view(Site::templateResolver('core::website.listings.index'),['results'=>$results,'total'=>$total]);
    }

    public function sold()
    {
        //status should be dynamic
        $model  = $this->model->where('picture_count','>',0)
            ->where('status','Closed')
            ->select('id','system_price','picture_count','status','address_street','state','city','county','year_built','total_finished_area','baths_full','bedrooms')
            ->orderBy('input_date')
            ->has('image','>',0);
        $total = $this->model->where('status','Active')->count();
        $results = $model->with('image')
            ->paginate(40);
        return view(Site::templateResolver('core::website.listings.index'),['results'=>$results,'total'=>$total]);
    }

    public function single($id)
    {
        $result = $this->model->where('id',$id)->with('details')->with('images')->first();
        return view(Site::templateResolver('core::website.listings.single'),['result'=>$result]);
    }
}
