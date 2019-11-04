<?php
namespace Robust\RealEstate\UI;

use Robust\Core\UI\Core\BaseUI;

/**
 * Class MlsUser
 * @package Robust\Mls\UI
 */
class MlsLog extends BaseUI
{
    /**
     * @var string
     */
    protected $route_name = "mlsuser";

    /**
     * @var array
     */
    public $columns = [
        'resource' => 'Resource',
        'class' => 'Class',
        'query_limit' => 'Limit',
        'data_count' => 'Count',
        'status' => 'Status',
    ];







    /**
     * @param $model
     * @return array
     */
    public function getTabs($model)
    {
        return [

        ];
    }

}
