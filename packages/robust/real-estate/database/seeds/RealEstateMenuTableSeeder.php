<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealEstateMenuTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('menus')->insert([
            [
                'display_name' => 'Pages',
                'name' => 'real-estate',
                'url' => route('admin.pages.index'),
                'permission' => 'real-estate.pages.manage',
                'package_name' => 'real-estate',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'pages'
            ]
        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Banners',
                'name' => 'real-estate',
                'url' => route('admin.banners.index'),
                'permission' => 'real-estate.banners.manage',
                'package_name' => 'real-estate',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'art_track'
            ]
        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Real Estate',
                'name' => 'real-estate',
                'url' => 'javascript:void(0)',
                'permission' => 'real-estate.manage',
                'package_name' => 'real-estate',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'landscape'
            ]
        ]);
        $id = DB::table('menus')->max('id');
        DB::table('menus')->insert([
            [
                'display_name' => 'Leads',
                'name' => 'real-estate.leads',
                'url' => route('admin.leads.index'),
                'permission' => 'real-estate.leads.manage',
                'package_name' => 'real-estate',
                'parent_id' => $id,
                'type' => 'child',
                'icon' => 'show_chart'
            ]
        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Agents',
                'name' => 'real-estate.agents',
                'url' => route('admin.agents.index'),
                'permission' => 'real-estate.agents.manage',
                'package_name' => 'real-estate',
                'parent_id' => $id,
                'type' => 'child',
                'icon' => 'group_add'
            ]
        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Email Templates',
                'name' => 'real-estate.email-templates',
                'url' => route('admin.email-templates.index'),
                'permission' => 'real-estate.email-templates.manage',
                'package_name' => 'real-estate',
                'parent_id' => $id,
                'type' => 'child',
                'icon' => 'email'
            ]
        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Groups',
                'name' => 'real-estate.groups',
                'url' => route('admin.groups.index'),
                'permission' => 'real-estate.groups.manage',
                'package_name' => 'real-estate',
                'parent_id' => $id,
                'type' => 'child',
                'icon' => 'group_work'
            ]
        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Locations',
                'name' => 'real-estate.locations',
                'url' => route('admin.locations.index'),
                'permission' => 'real-estate.locations.manage',
                'package_name' => 'real-estate',
                'parent_id' => $id,
                'type' => 'child',
                'icon' => 'location_on'
            ]
        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Attributes',
                'name' => 'real-estate.attributes',
                'url' => route('admin.attributes.index'),
                'permission' => 'real-estate.attributes.manage',
                'package_name' => 'real-estate',
                'parent_id' => $id,
                'type' => 'child',
                'icon' => 'dns'
            ]
        ]);
    }
}
