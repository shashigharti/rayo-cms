<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MarketReportMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rws:reports-migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    protected $mapping = [
      'App\City' => '\Robust\RealEstate\Models\City',
      'App\Area' => '\Robust\RealEstate\Models\Area',
      'App\County' => '\Robust\RealEstate\Models\County',
      'App\HighSchool' => '\Robust\RealEstate\Models\HighSchool',
      'App\Subdivision' => '\Robust\RealEstate\Models\Subdivision',
      'App\Zip' => '\Robust\RealEstate\Models\Zip',
    ];
    public function handle()
    {
        $query = DB::connection('mysql2')->table('reports');
        $total = $query->count();
        $processed = 0;
        DB::table('real_estate_market_reports')->truncate();
        $query->chunkById(1000,function ($reports) use ($total,$processed){
           foreach ($reports as $report)
           {
               $type = $this->mapping[$report->model_type];
               $id = DB::table('real_estate_locations')
                    ->where('locationable_type',$type)
                    ->where('slug',$report->slug)->first()->id;
               $report = (array) $report;
               $report['location_id'] = $id;
               $report['location_type'] = $type;
               unset($report['model_id']);
               unset($report['model_type']);
               DB::table('real_estate_market_reports')->insert($report);
               $processed+=1;
               $this->info('Total : ' . $total . ' || Processed : ' . $processed);
           }
        });
    }
}
