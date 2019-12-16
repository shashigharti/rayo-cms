<?php
namespace Robust\RealEstate\Controllers\API;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\API\ListingRepository;

/**
 * Class ListingController
 * @package Robust\RealEstate\Controllers\API
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

}
