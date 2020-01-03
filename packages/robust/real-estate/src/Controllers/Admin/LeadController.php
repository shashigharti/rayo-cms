<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Admin\LeadRepository;


class LeadController extends Controller
{
   
    protected $model;

    public function __construct(LeadRepository $model)
    {
        $this->model = $model;
    }
}
