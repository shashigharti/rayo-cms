<?php
namespace Robust\Core\Controllers\API;

use App\Http\Controllers\Controller;
use Robust\Core\Repositories\API\SettingsRepository;


/**
 * Class SettingsController
 * @package Robust\Core\Controllers\API
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

    public function sendTestEmail()
    {
      return 'Hello';
    }
}
