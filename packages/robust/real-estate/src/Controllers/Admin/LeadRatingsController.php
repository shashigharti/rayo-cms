<?php
namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\RealEstate\Repositories\Admin\LeadRatingsRepository;

/**
 * Class LeadRatingsController
 * @package Robust\RealEstate\Controllers\Admin
 */
class LeadRatingsController extends Controller
{
    use CrudTrait;

    /**
     * @var LeadRatingsRepository
     */
    protected $model;

    /**
     * LeadRatingsController constructor.
     * @param LeadRatingsRepository $model
     */
    public function __construct(LeadRatingsRepository $model)
    {
        $this->model = $model;
    }
}
