<?php

namespace Robust\RealEstate\Controllers\API;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\API\Traits\CrudTrait;
use Robust\RealEstate\Repositories\Api\CoreEmailRepository;


/**
 * Class EmailController
 * @package Robust\RealEstate\Controllers\API
 */
class EmailController extends Controller
{
    use CrudTrait;
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
