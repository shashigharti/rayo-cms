<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealEstateMenuTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('menus')->insert([
            [
                'display_name' => 'Database Management',
                'name' => 'core.backup',
                'url' => route('admin.backup.index'),
                'permission' => 'core.backup.manage',
                'package_name' => 'core',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'md-home'
            ],
        ]);
    }
}
