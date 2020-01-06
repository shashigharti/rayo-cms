<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;
use Robust\RealEstate\Repositories\Admin\EmailTemplateRepository;


class EmailTemplateController extends Controller
{
    use CrudTrait, ViewTrait;
    protected $model;

    public function __construct(EmailTemplateRepository $model)
    {
        $this->model = $model;
        $this->ui = 'Robust\RealEstate\UI\EmailTemplate';
        $this->package_name = 'real-estate';
        $this->view = 'admin.email-templates';
        $this->title = 'Email Templaes';
    }
}
