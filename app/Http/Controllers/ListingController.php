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
            ->where('status','Active')
            ->select('system_price','picture_count','status','address_street','state','city','county','year_built','total_finished_area','baths_full','bedrooms')
            ->orderBy('input_date');
        $results = $model->with('image')
                ->paginate(40);
        $total = $this->model->where('status','Active')->count();
        return view(Site::templateResolver('core::website.listings.index'),['results'=>$results,'total'=>$total]);
    }
}
