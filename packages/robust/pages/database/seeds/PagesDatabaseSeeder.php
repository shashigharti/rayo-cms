<?php

use Illuminate\Database\Seeder;

/**
 * Class PagesDatabaseSeeder
 */
class PagesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PagesMenuTableSeeder::class);
    }
}
