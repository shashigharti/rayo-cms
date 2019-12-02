<?php
namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;

use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\RealEstate\Repositories\Api\LeadFollowUpRepository;


class LeadFollowUpController extends Controller
{
    use ApiTrait;
    protected $model,$resource;
    protected $storeRequest,$updateRequest;


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
