<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealEstateMenuTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('menus')->insert([
            [
                'display_name' => 'Real Estate',
                'name' => 'real-estate',
                'url' => 'javascript:void(0)',
                'permission' => 'real-estate.manage',
                'package_name' => 'real-estate',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'md-home'
            ]
        ]);
        $id = DB::table('menus')->max('id');
        DB::table('menus')->insert([
            [
                'display_name' => 'Leads',
                'name' => 'real-estate.leads',
                'url' => route('real-estate.leads.index'),
                'permission' => 'real-estate.leads',
                'package_name' => 'real-estate',
                'parent_id' => $id,
                'type' => 'primary',
                'icon' => 'md-home'
            ]
        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Agents',
                'name' => 'real-estate.agents',
                'url' => route('real-estate.agents.index'),
                'permission' => 'real-estate.agents',
                'package_name' => 'real-estate',
                'parent_id' => $id,
                'type' => 'primary',
                'icon' => 'md-home'
            ]
        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Email Templates',
                'name' => 'real-estate.email-templates',
                'url' => route('real-estate.email-templates.index'),
                'permission' => 'real-estate.email-templates',
                'package_name' => 'real-estate',
                'parent_id' => $id,
                'type' => 'primary',
                'icon' => 'md-home'
            ]
        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Groups',
                'name' => 'real-estate.groups',
                'url' => route('real-estate.groups.index'),
                'permission' => 'real-estate.groups',
                'package_name' => 'real-estate',
                'parent_id' => $id,
                'type' => 'primary',
                'icon' => 'md-home'
            ]
        ]);
    }
}
