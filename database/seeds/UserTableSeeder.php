<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Robust',
            'last_name' => 'IT',
            'email' => 'info@robustitconcepts.com',
            'password' => '$2y$10$x1XeD20yDKhpBXHv/nRjU.SW82e/dcPaUIAaMY.WDTcA0GvmlyN4K',
        ]);
    }
}
