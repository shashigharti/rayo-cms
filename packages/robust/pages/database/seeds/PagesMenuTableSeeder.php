<?php

use Illuminate\Database\Seeder;

/**
 * Class PagesMenuTableSeeder
 */
class PagesMenuTableSeeder extends Seeder
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
                'display_name' => 'Pages',
                'name' => 'pages',
                'url' => 'javascript:void(0)',
                'permission' => 'pages.manage',
                'package_name' => 'pages',
                'parent_id' => 0,
                'type' => 'primary',
                'order' => 6,
                'icon' => 'md-file-text'
            ]
        ]);
        $id = DB::table('menus')->max('id');

        DB::table('menus')->insert([
            [
                'display_name' => 'Page Categories',
                'name' => 'pagecategories',
                'url' => route('admin.pagecategories.index'),
                'permission' => 'pages.categories.manage',
                'package_name' => 'pages',
                'parent_id' => $id,
                'type' => 'primary',
                'order' => 6,
                'icon' => 'md-layers'
            ]
        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Pages',
                'name' => 'pages',
                'url' => route('admin.pages.index'),
                'permission' => 'pages.manage',
                'package_name' => 'pages',
                'parent_id' => $id,
                'type' => 'primary',
                'order' => 7,
                'icon' => 'md-file-text'
            ]
        ]);
    }
}