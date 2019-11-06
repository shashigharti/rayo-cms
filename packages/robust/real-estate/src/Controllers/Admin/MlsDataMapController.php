<?php


namespace Robust\RealEstate\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\ListingDetail;
use Robust\RealEstate\Models\MlsDataMap;
use Robust\RealEstate\Models\MlsFieldDetail;
use Robust\RealEstate\Models\MlsSampleData;
use Robust\RealEstate\Models\MlsUser;
use Robust\RealEstate\Repositories\Admin\MlsDataMapRepository;

/**
 * Class MlsDataMapController
 * @package Robust\Mls\Controllers\Admin
 */
class MlsDataMapController extends Controller
{
    /**
     * MlsDataMapController constructor.
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
        $resources = [];
        foreach ($mls_data_maps as $maps)
        {
            $resources[$maps->resource] = $maps->resource;
        }
        return view('mls::admin.users.data-map',[
            'resources' => $resources,
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
    public function getFieldValues(Request $request)
    {
        $data = $request->all();
        $mls_data = MlsDataMap::where('resource',$data['resource'])
                    ->where('class',$data['class'])
                    ->where('mls_user_id',$data['user'])
                    ->first();
        $details = MlsFieldDetail::where('resource',$data['resource'])
            ->where('class',$data['class'])
            ->where('mls_user_id',$data['user'])
            ->get();
        $mls_keys = [];
        foreach ($details as $detail)
        {
            $mls_keys[$detail->system_name] = $detail->long_name;
        }
        $status = $mls_data->status;
        $fields = json_decode($mls_data->maps,true);
        $listing =new Listing();
        $listing_detail = new ListingDetail();
        $listings_fillable = $listing->getFillable();
        $listing_detail_fillable = $listing_detail->getFillable();
        $listing_fillable = [
            '' => 'Choose Mapping key'
        ];
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
        $others = json_decode($mls_data->others,true);
        $additional = json_decode($mls_data->additional,true);
        $samples = json_decode($mls_data->mls_data_sample,true);
        $view = view('mls::admin.users.partials.map-fields',[
            'status' => $status,
            'fields'=> $fields,
            'fillable' => $fillable,
            'mls_keys' => $mls_keys,
            'others' => $others,
            'additional' => $additional,
            'samples' => $samples,
        ])->render();
        return response()->json(['view' => $view]);
    }

    /**
     * @param $user_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($user_id, Request $request)
    {
        $data = $request->all();
        $values = $data['value'];
        $mls_data_map = MlsDataMap::where('mls_user_id',$user_id)
                    ->where('resource',$data['resource'])
                    ->where('class',$data['class'])
                    ->first();
        $mls_keys = json_decode($mls_data_map->mls_keys,true);
        $mls_data_map->update([
            'status'=>$data['status'],
            'maps'=>json_encode($values),
            'additional' => isset($data['additional']) ? json_encode($data['additional']) : null
        ]);
        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function other($id)
    {
        $model = new MlsDataMap();
        $mls_data_maps = MlsDataMap::select('resource')->where('mls_user_id',$id)->get();
        $resources = [];
        foreach ($mls_data_maps as $maps)
        {
            $resources[$maps->resource] = $maps->resource;
        }
        return view('mls::admin.users.other-data',[
            'resources' => $resources,
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
    public function additionalFields(Request $request)
    {
        $data = $request->all();
        $mls_data = MlsDataMap::where('resource',$data['resource'])
                    ->where('class',$data['class'])
                    ->where('mls_user_id',$data['user'])->first();
        $status = $mls_data->status;
        $class = $mls_data->class;
        $fields = json_decode($mls_data->maps,true);
        $additional = json_decode($mls_data->others,true);
        if($additional == null)
        {
            $additional = [];
        }
        $view = view('mls::admin.users.partials.additional',[
            'status' => $status,
            'class' =>$class,
            'fields'=> $fields,
            'additional' => $additional
        ])->render();
        return response()->json(['view' => $view]);
    }

    /**
     * @param $user_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeAdditional($user_id, Request $request)
    {
        $data = $request->all();
        $mls_data_map = MlsDataMap::where('mls_user_id',$user_id)
            ->where('resource',$data['resource'])
            ->first();
        $mls_data_map->update([
            'status'=>$data['status'],
            'others'=>json_encode($data['other'])
        ]);
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getClasses(Request $request)
    {
        $data = $request->all();
        $mls_classes = MlsDataMap::where('resource',$data['resource'])->where('mls_user_id',$data['user'])->pluck('class')->toArray();
        $classes = [];
        foreach ($mls_classes as $class)
        {
            $classes[$class] = $class;
        }
        $view = view('mls::admin.users.partials.classes',[
            'classes' => $classes
        ])->render();
        return response()->json(['view' => $view]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fieldDetails($id)
    {
        $model = new MlsDataMap();
        $mls_data_maps = MlsDataMap::select('class','resource','others')->where('mls_user_id',$id)->get();
        $resources = [];
        foreach ($mls_data_maps as $maps)
        {
            $resources[$maps->resource] = $maps->resource;
        }
        return view('mls::admin.users.field-details',[
            'resources' => $resources,
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
    public function getFieldTable(Request $request)
    {
        $data = $request->all();
        $field_details = MlsFieldDetail::where('mls_user_id',$data['user'])
                        ->where('resource',$data['resource'])
                        ->where('class',$data['class'])
                        ->get();
        $listing =new Listing();
        $listings = $listing->getFillable();
        $fillable = [
            '' => 'Choose Mapping key'
        ];
        foreach ($listings as $fill)
        {
            $fillable[$fill] = $fill;
        }
        $sample_data = '';
        $mls_sample_data = MlsSampleData::where('mls_user_id',$data['user'])
                    ->where('resource',$data['resource'])
                    ->where('class',$data['class'])
                    ->first();
        if($mls_sample_data){
            $sample_data = $mls_sample_data->data;
        }
        $view = view('mls::admin.users.partials.details',[
            'field_details' => $field_details,
            'fillable' => $fillable,
            'user_id' => $data['user'],
            'data' => $sample_data
        ])->render();
        return response()->json(['view' => $view]);

    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadFieldDetails($id, Request $request)
    {
        $req = $request->all();
        if($request->has('mapped_key')){
            $mapped_keys = $req['mapped_key'];
            foreach ($mapped_keys as $id => $key)
            {
                if($key != '')
                {
                    MlsFieldDetail::where('id',$id)->update(['mapped_key'=>$key]);
                }
            }
        }
        if($request->hasFile('file')){
            $path = $request->file('file')->getRealPath();
            $datas = array_map('str_getcsv',file($path));
            array_shift($datas);
            foreach ($datas as $data)
            {
                $result = [
                    'mls_user_id' =>$id,
                    'resource' => $req['resource'],
                    'class'=> $req['class'],
                    'system_name'=> $data[0],
                    'standard_name'=> $data[1],
                    'long_name'=> $data[2],
                    'db_name'=> $data[3],
                    'short_name'=> $data[4],
                    'max_length'=> $data[5],
                ];
                MlsFieldDetail::create($result);
            }
        }
        if($request->has('data')){
            MlsSampleData::create([
                'mls_user_id' =>$id,
                'resource' => $req['resource'],
                'class'=> $req['class'],
                'data'=> $req['data']
            ]);
        }
        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeArray($id)
    {
        $mls_user = MlsUser::where('id',$id)->first();
        $config = config('mls.' . $mls_user->slug);
        foreach ($config as $resource => $property)
        {
            foreach ($property as $class => $maps)
            {
                $data_map = MlsDataMap::where('resource',$resource)->where('class',$class)
                    ->where('mls_user_id',$id)
                    ->first();
                $data_map->update([
                    'maps' => json_encode($maps)
                ]);
            }
        }
        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function pullData($id)
    {
        Artisan::call('mls:pull-data',['id'=>$id]);
        return redirect()->route('admin.mlslog.index',['id'=>$id]);
    }
}
