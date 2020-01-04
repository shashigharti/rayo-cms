<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Admin\EmailTemplate;


class EmailTemplateController extends Controller
{
   
    protected $model;

    public function __construct(EmailTemplate $model)
    {
        $this->model = $model;
    }
}
