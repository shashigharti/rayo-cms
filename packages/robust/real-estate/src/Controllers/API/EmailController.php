<?php

namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\RealEstate\Repositories\Api\CoreEmailRepository;


/**
 * Class EmailController
 * @package Robust\RealEstate\Controllers\Api
 */
class EmailController extends Controller
{
    use ApiTrait;
    /**
     * @var CoreEmailRepository
     */
    /**
     * @var CoreEmailRepository|string
     */
    protected $model,$resource;

    /**
     * EmailController constructor.
     * @param CoreEmailRepository $model
     */
    public function __construct(CoreEmailRepository $model)
    {
        $this->model = $model;
        $this->resource= 'Robust\RealEstate\Resources\CoreEmailTemplate';
    }
}
