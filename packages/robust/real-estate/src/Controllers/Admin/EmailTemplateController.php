<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;
use Robust\RealEstate\Repositories\Admin\EmailTemplateRepository;


/**
 * Class EmailTemplateController
 * @package Robust\RealEstate\Controllers\Admin
 */
class EmailTemplateController extends Controller
{
    use CrudTrait, ViewTrait;

    /**
     * @var EmailTemplateRepository
     */
    protected $model;

    /**
     * EmailTemplateController constructor.
     * @param EmailTemplateRepository $model
     */
    public function __construct(EmailTemplateRepository $model)
    {
        $this->model = $model;
        $this->ui = 'Robust\RealEstate\UI\EmailTemplate';
        $this->package_name = 'real-estate';
        $this->view = 'admin.email-templates';
        $this->title = 'Email Templaes';
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function previewTemplate($id)
    {
        $model = $this->model->findOrFail($id);
        return view('real-estate::admin.email-templates.preview',
            [
                'model'=>$model,
                'title'=>'Preview',
                'ui' => new \Robust\RealEstate\UI\EmailTemplate
            ]
        );
    }
}
