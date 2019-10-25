<?php

namespace Robust\Landmarks\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\LandMarks\Repositories\Admin\ZipRepository;
use Robust\Landmarks\Resources\Zip as ZipResource;


/**
 * Class SettingsApiController
 * @package Robust\Settings\Controllers\Admin
 */
class ZipController extends Controller
{
    use ApiTrait;
    /**
     * @var ZipRepository
     */
    protected $model ;
    protected $resource;

    /**
     * ZipController constructor.
     * @param ZipRepository $model
     */
    public function __construct(ZipRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\Landmarks\Resources\Zip';
    }

}


