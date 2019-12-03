<?php

namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\RealEstate\Repositories\Api\ZipRepository;


/**
 * Class ZipController
 * @package Robust\RealEstate\Controllers\Api
 */
class ZipController extends Controller
{
    use ApiTrait;
    /**
     * @var ZipRepository
     */
    protected $model ;
    /**
     * @var string
     */
    protected $resource;

    /**
     * @var array
     */
    /**
     * @var array
     */
    protected $storeRequest,$updateRequest;
    /**
     * ZipController constructor.
     * @param ZipRepository $model
     */
    public function __construct(ZipRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\RealEstate\Resources\Zip';
        $this->storeRequest = [
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
        ];
        $this->updateRequest = [
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
        ];
    }

}


