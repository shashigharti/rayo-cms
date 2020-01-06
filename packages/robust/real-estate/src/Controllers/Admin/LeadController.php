<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Admin\LeadRepository;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;

class LeadController extends Controller
{
    use CrudTrait, ViewTrait;
    protected $model;

    public function __construct(LeadRepository $model)
    {
        $this->model = $model;
        $this->ui = 'Robust\RealEstate\UI\Lead';
        $this->package_name = 'real-estate';
        $this->view = 'admin.leads';
        $this->title = 'Leads';
        $this->table = 'real-estate::admin.leads.index';
    }
}
