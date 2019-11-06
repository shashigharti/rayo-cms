<?php


namespace Robust\RealEstate\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\ListingDetail;
use Robust\RealEstate\Models\MlsDataMap;
use Robust\RealEstate\Models\MlsDataRemap;
use Robust\RealEstate\Repositories\Admin\MlsDataMapRepository;

/**
 * Class MlsDataRemapController
 * @package Robust\Mls\Controllers\Admin
 */
class MlsDataRemapController extends Controller
{
    /**
     * MlsDataRemapController constructor.
     * @param MlsDataMapRepository $model
     */
    public function __construct(MlsDataMapRepository $model)
    {
        $this->model = $model;
        $this->package_name = 'mls';
        $this->view = 'admin.users';
        $this->title = 'Mls Users Data Map';
        $this->ui = 'Robust\RealEstate\UI\MlsDataMap';
        $this->redirect = 'admin.mlsuser';
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $model = new MlsDataMap();
        $mls_data_maps = MlsDataMap::select('class','resource','others')->where('mls_user_id',$id)->get();
        $listing =new Listing();
        $listing_detail = new ListingDetail();
        $listings_fillable = $listing->getFillable();
        $listing_detail_fillable = $listing_detail->getFillable();
        $detail_fillable = [];
        foreach ($listings_fillable as $fill)
        {
            $listing_fillable[$fill] = $fill;
        }
        foreach ($listing_detail_fillable as $fill)
        {
            $detail_fillable[$fill] = $fill;
        }
        $fillable = array_merge($listing_fillable,$detail_fillable);
        $resources = [];
        foreach ($mls_data_maps as $maps)
        {
            $resources[$maps->resource] = $maps->resource;
        }
        return view('mls::admin.users.data-remap',[
            'resources' => $resources,
            'fillable' => $fillable,
            'ui'=> $this->ui,
            'title' => $this->title,
            'model' =>$model,
            'user_id' => $id
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getField(Request $request)
    {
        $data = $request->all();
        $mls_data = MlsDataRemap::select('remaps')
            ->where('resource',$data['resource'])
            ->where('class',$data['class'])
            ->where('mls_user_id',$data['user'])
            ->where('remap_key',$data['key'])
            ->first();
        $remaps = [];
        if($mls_data){
            $remaps = json_decode($mls_data->remaps,true);
        }
        $view = view('mls::admin.users.partials.remap',[
            'remaps' => $remaps,
        ])->render();
        return response()->json(['view' => $view]);
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
        $values = $data['value'];
        $remaps = [];
        foreach ($fields as $key => $field)
        {
            if($field != null && $values[$key] != ''){
                $remaps[$field] = $values[$key];
            }
        }
        $mls_data_remap = MlsDataRemap::where('resource',$data['resource'])
            ->where('class',$data['class'])
            ->where('mls_user_id',$id)
            ->where('remap_key',$data['key'])
            ->first();
        if($mls_data_remap){
            $mls_data_remap->update([
                'remaps' => json_encode($remaps)
            ]);
        } else{
            MlsDataRemap::create([
               'class' => $data['class'],
               'resource' => $data['resource'],
               'mls_user_id' => $id,
               'remap_key' => $data['key'],
                'remaps' => json_encode($remaps)
            ]);
        }
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function addField()
    {
        $view = view('mls::admin.users.partials.remap-field',[
           'key' => null,
           'value' => null
        ])->render();
        return response()->json(['view' => $view]);
    }
}
