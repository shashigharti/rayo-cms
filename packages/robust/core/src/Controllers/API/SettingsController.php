<?php
namespace Robust\RealEstate\Controllers\API;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\API\SettingsRepository;


/**
 * Class SettingsController
 * @package Robust\RealEstate\Controllers\API
 */
class SettingsController extends Controller
{

    /**
     * @var AttributeRepository
     */
    protected $model;   


    /**
     * SettingsController constructor.
     * @param SettingsRepository $model
     */
    public function __construct(SettingsRepository $model)
    {
        $this->model = $model;
    }

    public function sendTestEmail(){
        //write code here
    }
}
