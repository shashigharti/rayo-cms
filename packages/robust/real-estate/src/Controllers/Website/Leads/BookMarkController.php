<?php


namespace Robust\RealEstate\Controllers\Website\Leads;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Website\BookMarkRepository;


/**
 * Class BookMarksController
 * @package Robust\RealEstate\Controllers\Website\Leads
 */
class BookMarkController extends Controller
{

    /**
     * @var BookMarkRepository
     */
    protected $model;


    /**
     * BookMarksController constructor.
     * @param BookMarkRepository $model
     */
    public function __construct(BookMarkRepository $model)
    {
        $this->model = $model;
    }


    /**
     * @param $title
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($title)
    {
       $this->model->store([
           'lead_id' => \Auth::user()->memberable->id,
           'title'=>$title,
           'url' => url()->previous()
       ]);
       return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
       $this->model->delete($id);
       return redirect()->back();
    }
}
