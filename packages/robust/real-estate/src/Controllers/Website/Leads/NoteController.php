<?php


namespace Robust\RealEstate\Controllers\Website\Leads;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Robust\RealEstate\Repositories\Website\NoteRepository;


/**
 * Class NoteController
 * @package Robust\RealEstate\Controllers\Website\Leads
 */
class NoteController extends Controller
{

    /**
     * @var NoteRepository
     */
    protected $model;


    /**
     * NoteController constructor.
     * @param NoteRepository $model
     */
    public function __construct(NoteRepository $model)
    {
        $this->model = $model;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['agent_id'] = 1 ; //should be from leads table
        $data['lead_id'] = Auth::user()->memberable->id;
        $data['title'] = 'Note for listing';
        $this->model->store($data);
        return response()->json(['message' => 'Success'],200);
    }
}
