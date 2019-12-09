<?php


namespace Robust\RealEstate\Controllers\Website\Leads;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Robust\RealEstate\Repositories\Website\FavouriteRepository;

/**
 * Class FavouritesController
 * @package Robust\RealEstate\Controllers\Website\Leads
 */
class FavouritesController extends Controller
{
    /**
     * @var FavouriteRepository
     */
    protected $model;

    /**
     * FavouritesController constructor.
     * @param FavouriteRepository $model
     */
    public function __construct(FavouriteRepository $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($id)
    {
        $data = [
            'lead_id' => Auth::user()->member->id,
            'listings_id' => $id
        ];
        $this->model->store($data);
        return redirect()->back();
    }
}
