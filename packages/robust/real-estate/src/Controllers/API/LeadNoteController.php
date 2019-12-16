<?php
namespace Robust\RealEstate\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Robust\Core\Controllers\API\Traits\CrudTrait;
use Robust\RealEstate\Repositories\Api\LeadNoteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


/**
 * Class LeadNoteController
 * @package Robust\RealEstate\Controllers\API
 */
class LeadNoteController extends Controller
{
    use CrudTrait;
    /**
     * @var LeadNoteRepository
     */
    /**
     * @var LeadNoteRepository|string
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
     * LeadNoteController constructor.
     * @param LeadNoteRepository $model
     */
    public function __construct(LeadNoteRepository $model)
    {
        $this->model=$model;
        $this->resource = 'Robust\RealEstate\Resources\LeadNote';
        $this->storeRequest = [
            'lead_id' => 'required',
            'title' => 'required',
            'note' => 'required',
        ];
        $this->updateRequest = [
            'lead_id' => 'required',
            'title' => 'required',
            'note' => 'required',
        ];
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if(isset($this->storeRequest)){
            $validator = Validator::make($data,$this->storeRequest);
            if($validator->fails()){
                return response()->json(['errors' => $validator->errors()],422);
            }
        }
        $data['agent_id'] = Auth::user()->member->id ?? 1;
        $this->model->store($data);
        return response()->json(['message' => 'success']);
    }
}
