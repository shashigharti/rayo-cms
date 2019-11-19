<?php

namespace Robust\Menus\Controllers\Api;


use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\Menus\Repositories\Admin\MenuRepository;


/**
 * Class MenuApiController
 * @package Robust\Menus\Controllers\Admin
 */
class MenuController extends Controller
{
    use ApiTrait;
    /**
     * @var MenuRepository
     */
    /**
     * @var MenuRepository|string
     */
    protected $model,$resource,$storeRequest,$updateRequest;

    /**
     * MenuController constructor.
     * @param MenuRepository $model
     */
    public function __construct(MenuRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\Menus\Resources\Menu';
        $this->storeRequest = [
            'name' => 'required|max:255',
            'items' => 'required',
            'menu_limit' => 'required',
            'type' => 'required',
        ];
        $this->updateRequest = [
            'name' => 'required|max:255',
            'items' => 'required',
            'menu_limit' => 'required',
            'type' => 'required',
        ];
    }
}
