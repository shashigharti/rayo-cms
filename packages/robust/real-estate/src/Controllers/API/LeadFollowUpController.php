<?php
namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;

use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\RealEstate\Repositories\Api\LeadFollowUpRepository;


/**
 * Class LeadFollowUpController
 * @package Robust\RealEstate\Controllers\Api
 */
class LeadFollowUpController extends Controller
{
    use ApiTrait;
    /**
     * @var LeadFollowUpRepository
     */
    /**
     * @var LeadFollowUpRepository|string
     */
    protected $model,$resource;
    /**
     * @var array
     */
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
