<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Robust\RealEstate\Repositories\Api\SubdivisionRepository;


class GroupSubdivision extends Command
{

    protected $signature = 'mls:group-subdivision';


    protected $description = 'Group Subdivisions';

    protected $model;

    public function __construct(SubdivisionRepository $model)
    {
        parent::__construct();
        $this->model = $model;
    }


    public function handle()
    {
        $result = DB::select('SELECT id
                                    FROM listings 
                                    WHERE listing_slug IN (
                                        SELECT listing_slug 
                                        FROM listings 
                                        GROUP BY listing_slug 
                                        HAVING COUNT(listing_slug) > 1
                                        ) 
                                    AND id NOT IN(
                                        SELECT id 
                                        FROM listings 
                                        GROUP BY listing_slug 
                                        HAVING COUNT(listing_slug) > 1
                                        )'
        );
        //to be done
//        dd($result);
    }
}
