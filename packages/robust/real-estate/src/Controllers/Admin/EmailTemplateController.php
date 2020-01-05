<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Admin\EmailTemplateRepository;


class EmailTemplateController extends Controller
{
   
    protected $model;

    public function __construct(EmailTemplateRepository $model)
    {
        $this->model = $model;
    }
}
