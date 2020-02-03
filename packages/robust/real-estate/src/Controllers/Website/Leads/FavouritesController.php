<?php


namespace Robust\RealEstate\Controllers\Website\Leads;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Robust\RealEstate\Repositories\Interfaces\IMarketReport;
use Robust\RealEstate\Repositories\Website\FavouriteRepository;
use Robust\RealEstate\Repositories\Website\ListingRepository;

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
            'lead_id' => Auth::user()->memberable->id,
            'listings_id' => $id
        ];
        $this->model->store($data);
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showListingsOnMap(ListingRepository $listing, Request $request)
    {
        $data = $request->all();
        $ids = collect(explode(',', $data['ids']));

        $listing_ids = $ids->map(function ($id) {
            return strstr($id, '-', true);
        });

        $response = $listing
            ->whereIn('id', $listing_ids)
            ->get();
        return view('core::website.user-profile.map', [
            'records' => $response
        ]);

        return view('core::website.market-report.map', [
            'records' => $response,
            'page_type' => ''
        ]);
    }
}


