<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class LocationDataMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rws:migrate-locations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Old Location data to new';

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
        'real_estate_cities' => [
            'table' => 'cities',
            'class' => '\Robust\RealEstate\Models\City'
        ],
        'real_estate_zips' => [
            'table' => 'zips',
            'class' => '\Robust\RealEstate\Models\Zip'
        ],
        'real_estate_counties' => [
            'table' => 'counties',
            'class' => '\Robust\RealEstate\Models\County'
        ],
        'real_estate_subdivisions' => [
            'table' => 'subdivisions',
            'class' => '\Robust\RealEstate\Models\Subdivision'
        ],
        'real_estate_areas' => [
            'table' => 'areas',
            'class' => '\Robust\RealEstate\Models\Area'
        ],
        'real_estate_elementary_schools' => [
            'table' => 'elem_schools',
            'class' => '\Robust\RealEstate\Models\ElementarySchool'
        ],
        'real_estate_middle_schools' => [
            'table' => 'middle_schools',
            'class' => '\Robust\RealEstate\Models\MiddleSchool'
        ],
        'real_estate_high_schools' => [
            'table' => 'high-schools',
            'class' => '\Robust\RealEstate\Models\HighSchool'
        ],
    ];

    protected $table = 'real_estate_locations';

    public function handle()
    {
        foreach ($this->mapping as $key => $map)
        {
            DB::table($key)->truncate();
        }
        foreach($this->mapping as $key => $map)
        {
            $this->info('Starting Migration for table' . $map['table']);
            $results = DB::connection('mysql2')->table($map['table'])->get();
            foreach ($results as $result)
            {
                $data = [
                    'name' => $result->name,
                    'slug' => $result->slug,
                    'created_at' => $result->created_at,
                    'updated_at' => $result->updated_at
                ];
                $id = DB::table($key)->insertGetId($data);
                $data['location_id'] = $id;
                $data['locationable_type'] = $map['class'];
                DB::table($this->table)->insert($data);
                $this->info('Table : ' . $key . ' || name : ' .$data['name']);
            }
            $this->info('Finished Migration for table' . $map['table']);
        }
    }
}
