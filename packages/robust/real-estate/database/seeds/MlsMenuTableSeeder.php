<?php
use Illuminate\Database\Seeder;

class MlsMenuTableSeeder extends Seeder
{
    public function run()
    {

        DB::table('menus')->insert([
            [
                'display_name' => 'MLS',
                'name' => 'mls',
                'url' => 'javascript:void(0)',
                'permission' => 'mls.manage',
                'package_name' => 'mls',
                'parent_id' => 0,
                'type' => 'primary',
                'order' => 7,
                'icon' => 'md-file-text'
            ]
        ]);
        $id = DB::table('menus')->max('id');
        DB::table('menus')->insert([
            [
                'display_name' => 'Mls Users',
                'name' => 'mlsusers',
                'url' => route('admin.mlsuser.index'),
                'permission' => 'mls.manage',
                'package_name' => 'mls',
                'parent_id' => $id,
                'type' => 'primary',
                'order' => 8,
                'icon' => 'md-layers'
            ]
        ]);
    }
}