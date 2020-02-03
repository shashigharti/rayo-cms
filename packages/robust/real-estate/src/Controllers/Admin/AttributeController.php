<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Admin\AttributeRepository;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;

/**
 * Class AttributeController
 * @package Robust\RealEstate\Controllers\Admin
 */
class AttributeController extends Controller
{
    use CrudTrait, ViewTrait;

    /**
     * @var AttributeRepository
     */
    protected $model;

    /**
     * AttributeController constructor.
     * @param AttributeRepository $model
     */
    public function __construct(AttributeRepository $model)
    {
        $this->model = $model;
        $this->ui = 'Robust\RealEstate\UI\Attribute';
        $this->package_name = 'real-estate';
        $this->view = 'admin.attributes';
        $this->title = 'Attributes';
    }
}
