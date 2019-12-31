<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class BannerMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rws:migrate-banners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates banners from old db';

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


    protected $table = 'cities';
    protected $price_ranges = [
        "10000-20000",
        "20000-30000",
        "30000-40000",
        "40000-50000",
        "50000-60000",
        "60000-70000",
        "70000-80000",
        "80000-90000",
        "90000-100000"
    ];

    public function handle()
    {
        DB::table('banners')->truncate();
        $cities = DB::connection('mysql2')->table($this->table)
                ->where('frontpage',0)
                ->get();
        foreach ($cities as $city)
        {
            $location = DB::table('real_estate_locations')
                        ->where('slug',$city->slug)
                        ->where('locationable_type','\Robust\RealEstate\Models\City')
                        ->first();
            $data = [
                'location_type' => 'cities',
                'prices' => $this->price_ranges,
                'location' => $location->id,
                'sub_areas' => [],
                'image' => ''
            ];
            $banner = DB::table('banners')->insert([
                'name' => $city->name,
                'slug' => $city->slug,
                'template' => 'single-col-block',
                'properties' => json_encode($data),
                'order' => $city->frontpage_order,
                'status' => 1
            ]);
            dump($banner);
        }
    }
}
