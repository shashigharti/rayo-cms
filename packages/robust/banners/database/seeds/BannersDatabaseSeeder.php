<?php

use Illuminate\Database\Seeder;

class BannersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BannersMenuTableSeeder::class);
    }
}
