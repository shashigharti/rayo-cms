<?php

use Illuminate\Database\Seeder;

class BannersMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Design Menu

        DB::table('menus')->insert([
            [
                'display_name' => 'Banners',
                'name' => 'banners',
                'url' => route('admin.banners.index'),
                'permission' => 'banners.manage',
                'package_name' => 'banners',
                'parent_id' => 0,
                'type' => 'primary',
                'order' => 8,
                'icon' => 'md-collection-image-o'
            ]
        ]);

    }
}