<?php
namespace Robust\RealEstate\Controllers\API;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\API\Traits\CrudTrait;
use Robust\RealEstate\Repositories\API\LeadFollowUpRepository;


/**
 * Class LeadFollowUpController
 * @package Robust\RealEstate\Controllers\API
 */
class LeadFollowUpController extends Controller
{
    use CrudTrait;
    /**
     * @var LeadFollowUpRepository|string
     */
    protected $model,$resource;
    /**
     * @var array
     */
    protected $storeRequest,$updateRequest;


    /**
     * LeadFollowUpController constructor.
     * @param LeadFollowUpRepository $model
     */
    public function __construct(LeadFollowUpRepository $model)
    {
        $this->model=$model;
        $this->resource = 'Robust\RealEstate\Resources\LeadFollowup';
        $this->storeRequest = [
            'lead_id' => 'required',
            'date' => 'required',
            'type' => 'required',
            'agent_id' => 'required',
            'note' => 'required',
        ];
        $this->updateRequest = [
            'lead_id' => 'required',
            'date' => 'required',
            'type' => 'required',
            'agent_id' => 'required',
            'note' => 'required',
        ];
    }
}
