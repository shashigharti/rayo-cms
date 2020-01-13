<?php


namespace Robust\RealEstate\Controllers\Website;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Models\Page;

/**
 * Class PageController
 * @package Robust\RealEstate\Controllers\Website
 */
class PageController extends Controller
{

    /**
     * @var Page
     */
    protected $model;

    /**
     * PageController constructor.
     * @param Page $model
     */
    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPage($slug)
    {
        $page = $this->model->where('slug', $slug)->firstOrFail();
        return view('real-estate::website.index',['model'=>$page]);
    }
}
