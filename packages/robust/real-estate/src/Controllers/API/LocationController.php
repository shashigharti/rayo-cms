<?php
namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller\Api;


/**
 * Class AgentsController
 * @package Robust\RealEstate\Controllers\Api
 */
class AgentsController extends Controller
{
    use ApiTrait;
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
