<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Admin\AttributeRepository;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;

class AttributeController extends Controller
{
    use CrudTrait, ViewTrait;
    protected $model;

    public function __construct(AttributeRepository $model)
    {
        $this->model = $model;
        $this->ui = 'Robust\RealEstate\UI\Attribute';
        $this->package_name = 'real-estate';
        $this->view = 'admin.attributes';
        $this->title = 'Attributes';
    }
}
