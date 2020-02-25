<?php


namespace Robust\Core\Controllers\Admin;


use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;
use Robust\Core\Repositories\Admin\EmailTemplateRepository;


class EmailTemplateController extends Controller
{
    use CrudTrait,ViewTrait;


    protected $model;


    public function __construct(EmailTemplateRepository $model)
    {

        $this->middleware('auth');
        $this->model = $model;
        $this->ui = 'Robust\Core\UI\EmailTemplate';
        $this->package_name = 'core';
        $this->view = 'admin.email-templates';
        $this->title = 'Email Templates';
    }

    public function previewTemplate($id)
    {
        $model = $this->model->findOrFail($id);
        return view('core::admin.email-templates.preview',
            [
                'model'=>$model,
                'title'=>'Preview',
                'ui' => new \Robust\RealEstate\UI\EmailTemplate
            ]
        );
    }
}
