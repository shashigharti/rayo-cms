<?php
namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;
use Robust\RealEstate\Models\LeadRating;
use Robust\RealEstate\Repositories\Admin\LeadRatingsRepository;

/**
 * Class LeadRatingsController
 * @package Robust\RealEstate\Controllers\Admin
 */
class LeadRatingsController extends Controller
{
    use CrudTrait, ViewTrait;

    /**
     * @var LeadRatingsRepository
     */
    protected $model;

    /**
     * LeadRatingsController constructor.
     * @param LeadRatingsRepository $model
     */
    public function __construct(LeadRatingsRepository $model)
    {
        $this->model = $model;
        $this->view = 'admin.leads.partials.popups.ratings';
    }

    /**
     * @param Request $request
     * @param $lead_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeLeadRating(Request $request, $lead_id)
    {
        $data = $request->all();
        $this->model->store($data);
        return response()->json(['data'=>$data]);
    }
}
