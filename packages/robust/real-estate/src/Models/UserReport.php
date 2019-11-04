<?php

namespace Robust\RealEstate\Models;


use Robust\Core\Models\BaseModel;


/**
 * Class UserReport
 * @package Robust\Leads\Models
 */
class UserReport extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'user_reports';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'frequency', 'content', 'type', 'url',
    ];

    /**
     * @return array|string
     */
    public function readableLocations()
    {
        $new_report = [];
        $content  = $this->content;
        $report = explode(',', $content);
        foreach ($report as $key => $value) {
            array_push($new_report, ucwords(str_replace('-', ' ', $value)));
        }

        $report = implode(', ', $new_report);

        return $report;
    }
}
