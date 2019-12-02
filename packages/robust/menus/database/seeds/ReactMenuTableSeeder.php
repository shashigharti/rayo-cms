<?php
use Illuminate\Database\Seeder;


class ReactMenuTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('menus')->where('package_name','react')->truncate();
        DB::table('menus')->insert([
                [
                'display_name' => 'Dashboard',
                'name' => 'react.dashboard',
                'url' => '/',
                'permission' => 'react.dashboard.view',
                'package_name' => 'react',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'settings_input_svideo',
                 'order' => '1'
                ],
                [
                    'display_name' => 'Leads',
                    'name' => 'react.leads',
                    'url' => '/leads',
                    'permission' => 'react.leads.view',
                    'package_name' => 'react',
                    'parent_id' => 0,
                    'type' => 'primary',
                    'icon' => 'show_chart',
                    'order' => '2'
                ]
            ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Pages',
                'name' => 'react.pages',
                'url' => '#',
                'permission' => 'react.pages',
                'package_name' => 'react',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'content_paste',
                'order' => '3'
            ],
        ]);
        $id = DB::table('menus')->max('id');
        DB::table('menus')->insert([
            [
                'display_name' => 'Pages',
                'name' => 'react.pages.view',
                'url' => '/pages',
                'permission' => 'react.pages.view',
                'package_name' => 'react',
                'parent_id' => $id,
                'type' => 'primary',
                'icon' => 'content_paste'
            ],
        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Locations',
                'name' => 'react.locations.view',
                'url' => '#',
                'permission' => 'react.locations.view',
                'package_name' => 'react',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'people_outline',
                'order' => '4'
            ],
        ]);
        $id = DB::table('menus')->max('id');
        DB::table('menus')->insert([
            [
                'display_name' => 'Cities',
                'name' => 'react.cities.view',
                'url' => '/cities',
                'permission' => 'react.cities.view',
                'package_name' => 'react',
                'parent_id' => $id,
                'type' => 'primary',
                'icon' => 'radio_button_unchecked'
            ],
            [
                'display_name' => 'Zips',
                'name' => 'react.zips.view',
                'url' => '/zips',
                'permission' => 'react.zips.view',
                'package_name' => 'react',
                'parent_id' => $id,
                'type' => 'primary',
                'icon' => 'radio_button_unchecked'
            ],
            [
                'display_name' => 'Counties',
                'name' => 'react.counties.view',
                'url' => '/counties',
                'permission' => 'react.counties.view',
                'package_name' => 'react',
                'parent_id' => $id,
                'type' => 'primary',
                'icon' => 'radio_button_unchecked'
            ],
        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Email Templates',
                'name' => 'react.email.view',
                'url' => '/templates',
                'permission' => 'react.email.view',
                'package_name' => 'react',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'people_outline',
                'order' => '5'
            ],
            [
                'display_name' => 'Banner',
                'name' => 'react.banner.view',
                'url' => '/banners',
                'permission' => 'react.banner.view',
                'package_name' => 'react',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'perm_media',
                'order' => '6'
            ],
            [
                'display_name' => 'Agent',
                'name' => 'react.agent.view',
                'url' => '/agents',
                'permission' => 'react.agent.view',
                'package_name' => 'react',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'supervised_user_circle',
                'order' => '7'
            ],
        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'User Management',
                'name' => 'react.admin.view',
                'url' => '#',
                'permission' => 'react.admin.view',
                'package_name' => 'react',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'people_outline',
                'order' => '8'
            ],
        ]);
        $id = DB::table('menus')->max('id');
        DB::table('menus')->insert([
            [
                'display_name' => 'Users',
                'name' => 'react.users.view',
                'url' => '/users',
                'permission' => 'react.users.view',
                'package_name' => 'react',
                'parent_id' => $id,
                'type' => 'primary',
                'icon' => 'radio_button_unchecked'
            ],
        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Groups',
                'name' => 'react.groups.view',
                'url' => '/groups',
                'permission' => 'react.groups.view',
                'package_name' => 'react',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'people_outline',
                'order' => '9'
            ],
        ]);
//        DB::table('menus')->insert([
//            [
//                'display_name' => 'Menus',
//                'name' => 'react.menus.view',
//                'url' => '/menus',
//                'permission' => 'react.menus.view',
//                'package_name' => 'react',
//                'parent_id' => 0,
//                'type' => 'primary',
//                'icon' => 'crop_original',
//                'order' => '10'
//            ],
//        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Settings',
                'name' => 'react.settings.view',
                'url' => '/settings',
                'permission' => 'react.settings.view',
                'package_name' => 'react',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'settings',
                'order' => '11'
            ],
        ]);
    }
}
