<?php

namespace App\Helpers;

use Carbon\Carbon;

/**
 * Class DateTimeHelper
 * @package App\Helpers
 */
class DateTimeHelper
{

    /**
     * @var \Carbon\Carbon
     */
    public $date;

    /**
     * DateTimeHelper constructor.
     */
    public function __construct()
    {
        $this->date = Carbon::now();
    }

    /**
     * @param $date
     * @return int
     * @throws \Exception
     */
    public function calcDifference($date)
    {
        $dateToCompare = new Carbon($date);
        return $dateToCompare->diffInDays();
    }
}
