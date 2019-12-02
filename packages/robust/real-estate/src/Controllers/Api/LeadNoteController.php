<?php
namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\RealEstate\Repositories\Api\LeadNoteRepository;


class LeadNoteController extends Controller
{
    use ApiTrait;
    protected $model,$resource;
    protected $storeRequest,$updateRequest;


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
