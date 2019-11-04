<?php


class RealEstateSeeder
{
    public function run()
    {
        $this->call(MlsMenuTableSeeder::class);
        $this->call(StatusTableSeeder::class);
    }
}
