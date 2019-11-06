<?php


namespace Robust\RealEstate\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\RealEstate\Models\MlsQuery;
use Robust\RealEstate\Repositories\Admin\MlsDataMapRepository;

/**
 * Class MlsQueryController
 * @package Robust\Mls\Controllers\Admin
 */
class MlsQueryController extends Controller
{
    /**
     * MlsQueryController constructor.
     * @param MlsDataMapRepository $model
     */
    public function __construct(MlsDataMapRepository $model)
    {
        $this->model = $model;
        $this->package_name = 'mls';
        $this->view = 'admin.users';
        $this->title = 'Mls Query';
        $this->ui = 'Robust\RealEstate\UI\MlsDataMap';
        $this->redirect = 'admin.mlsuser';
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $model = new MlsQuery();
        $mls_query = MlsQuery::where('mls_user_id',$id)->first();
        return view('mls::admin.users.query',[
            'ui'=> $this->ui,
            'title' => $this->title,
            'model' =>$model,
            'user_id' => $id,
            'fields' => config('mls.query'),
            'limit' => $mls_query->query_limit,
            'number_of_days' => $mls_query->number_of_days,
            'picture' => $mls_query->picture,
            'filters' => json_decode($mls_query->query_filter,true)
        ]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($id, Request $request)
    {
        $data = $request->all();
        $fields = $data['field'];
        $mapped_key = $data['mapped_key'];
        $value = $data['value'];
        $filters = [];
        foreach ($fields as $key => $field)
        {
            if($field != ''
                && isset($mapped_key[$key]) && $mapped_key[$key] != ''
                && isset($value[$key]) && $value[$key] != '')
            {
                $filter = [
                    'field' => $field,
                    'mapped_key' => $mapped_key[$key],
                    'value' => $value[$key]
                ];
                array_push($filters,$filter);
            }
        }

        MlsQuery::updateOrCreate(['mls_user_id'=>$id],[
           'query_filter' => json_encode($filters),
            'query_limit' => $data['query_limit'],
            'number_of_days' => $data['number_of_days'],
            'picture' => $data['picture']
        ]);
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function addField()
    {
        $view = view('mls::admin.users.partials.filters',[
            'fields' => config('mls.query'),
            'field' =>'',
            'mapped_key' => '',
            'value'=>''
        ])->render();
        return response()->json(['view'=>$view]);
    }
}
