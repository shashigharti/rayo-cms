<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Robust\RealEstate\Model\CoreSetting;


class AdvanceSearch extends Command
{
    /**
     * @var string
     */
    protected $signature = 'real-estate:advance-search';

    /**
     * @var string
     */
    protected $description = 'Generates default advance search';



    public function handle()
    {
        $blocks = ["type","status","picture","acres","price","lot","elementary"];
        $default = [];
        //types of property
        foreach ($blocks as $block)
        {
            $field = config('real-estate.search.'.$block);
            array_push($default,json_encode($field));
        }
        CoreSetting::updateOrCreate(['type'=>'advance-search'],[
           'type' => 'advance-search',
           'values' => json_encode($default)
        ]);
    }

}
