<?php

use Illuminate\Database\Seeder;

class AdminMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'display_name' => 'User Management',
                'name' => 'user-management',
                'url' => 'javascript:void(0)',
                'permission' => 'admin.user.manage',
                'package_name' => 'admin',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'people_outline'
            ]
        ]);
        $id = DB::table('menus')->max('id');

        DB::table('menus')->insert([
            [
                'display_name' => 'Users',
                'name' => 'user-management.users',
                'url' => route('admin.users.index'),
                'permission' => 'admin.user.manage',
                'package_name' => 'admin',
                'parent_id' => $id,
                'type' => 'child',
                'icon' => 'person_add'
            ],
            [
                'display_name' => 'Roles',
                'name' => 'user-management.roles',
                'url' => route('admin.roles.index'),
                'permission' => 'admin.user.manage',
                'package_name' => 'admin',
                'parent_id' => $id,
                'type' => 'child',
                'icon' => 'nature_people'

            ]
        ]);
    }
}
