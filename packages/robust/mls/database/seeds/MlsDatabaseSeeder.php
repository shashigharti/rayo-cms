<?php


class MlsDatabaseSeeder
{
    public function run()
    {
        $this->call(MlsMenuTableSeeder::class);
    }
}