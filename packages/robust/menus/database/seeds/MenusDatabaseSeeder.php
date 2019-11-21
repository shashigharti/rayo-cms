<?php
use Illuminate\Database\Seeder;


class MenusDatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(ReactMenuTableSeeder::class);
    }
}
