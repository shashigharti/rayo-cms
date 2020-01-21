<?php
namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\RealEstate\Repositories\Admin\LeadPropertiesRepositories;

/**
 * Class LeadPropertiesController
 * @package Robust\RealEstate\Controllers\Admin
 */
class LeadPropertiesController extends Controller
{

    /**
     * @var LeadPropertiesRepositories
     */
    protected $model;

    /**
     * LeadPropertiesController constructor.
     * @param LeadPropertiesRepositories $model
     */
    public function __construct(LeadPropertiesRepositories $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($id, Request $request)
    {
        $properties = $request->except('_token');
        foreach ($properties as $key => $property)
        {
            $this->model->store([
                'lead_id' => $id,
                'type' => $key,
                'value' => $property
            ]);
        }
        return redirect()->back();
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $properties = $request->except('_token');
        foreach ($properties as $key => $property)
        {
            $this->model->update($id,[
                'value' => $property
            ]);
        }
        return redirect()->back();
    }


    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePrice($id, Request $request)
    {
        $properties = $request->except('_token');
        foreach ($properties as $key => $property)
        {
            $this->model->updateOrCreate(['type' => $key],[
                'lead_id' => $id,
                'value' => $property
            ]);
        }
        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->back();
    }
}
