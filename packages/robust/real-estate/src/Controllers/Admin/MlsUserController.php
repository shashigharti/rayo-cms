<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Robust\Core\Controllers\Admin\Traits\CrudTrait;
use Illuminate\Http\Request;
use Robust\Core\Controllers\Admin\Traits\ViewTrait;
use Robust\RealEstate\Repositories\Admin\MlsUserRepository;

/**
 * Class MlsUserController
 * @package Robust\Mls\Controllers\Admin
 */
class MlsUserController extends Controller
{
    use CrudTrait,ViewTrait;

    /**
     * MlsUserController constructor.
     * @param Request $request
     * @param MlsUserRepository $mls_user
     */
    public function __construct(
        Request $request,
        MlsUserRepository $mls_user
    ) {
        $this->model = $mls_user;
        $this->request = $request;
        $this->ui = 'Robust\RealEstate\UI\MlsUser';
        $this->package_name = 'mls';
        $this->view = 'admin.users';
        $this->title = 'Mls Users';
        $this->redirect = 'admin.mlsuser';
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function metadata($id)
    {
        $model = $this->model->find($id);
        $title = 'Mls User Metadata';
        return view('mls::admin.users.metadata',['ui' => $this->ui,'model' => $model,'title'=>$title]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function generate($id)
    {
        Artisan::call('mls:generate-data-map',['id'=>$id]);
        return redirect()->route('admin.mlsuser.data-map',['id'=>$id]);
    }
}
