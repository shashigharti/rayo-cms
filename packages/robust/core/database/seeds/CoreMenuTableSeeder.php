<?php

use Illuminate\Database\Seeder;

class CoreMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Route::resources([
            'photos' => 'PhotoController',
            'posts' => 'PostController'
        ]);


        DB::table('menus')->insert([
            [
                'display_name' => 'Settings',
                'name' => 'core.settings',
                'url' => route('admin.settings.edit', ['general-setting']),
                'permission' => 'core.settings.edit',
                'package_name' => 'core',
                'parent_id' => 0,
                'type' => 'secondary',
                'icon' => 'md-settings'
            ],
            [
                'display_name' => 'Media Manager',
                'name' => 'core.medias',
                'url' => route('admin.medias.index'),
                'permission' => 'core.medias.manage',
                'package_name' => 'core',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'md-image'

            ]

        ]);
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
        $id = DB::table('menus')->max('id');
        DB::table('menus')->insert([
            [
                'display_name' => 'Back Up',
                'name' => 'core.backup',
                'url' => route('admin.backup.index'),
                'permission' => 'core.backup.manage',
                'package_name' => 'core',
                'parent_id' => $id,
                'type' => 'primary',
            ],

        ]);
        DB::table('menus')->insert([
            [
                'display_name' => 'Services',
                'name' => 'core.commands',
                'url' => route('admin.commands.index'),
                'permission' => 'core.commands.manage',
                'package_name' => 'core',
                'parent_id' => 0,
                'type' => 'primary',
                'icon' => 'md-home'
            ],
        ]);
        $id = DB::table('menus')->max('id');
        DB::table('menus')->insert([
            [
                'display_name' => 'Commands',
                'name' => 'core.commands',
                'url' => route('admin.commands.index'),
                'permission' => 'core.commands.manage',
                'package_name' => 'core',
                'parent_id' => $id,
                'type' => 'primary',
            ],

        ]);
        // DB::table('menus')->insert([
        //     [
        //         'display_name' => 'Task Schedules',
        //         'name' => 'core',
        //         'url' => route('admin.schedules.index'),
        //         'permission' => 'core.schedules.manage',
        //         'package_name' => 'core',
        //         'parent_id' => 0,
        //         'type' => 'primary',
        //         'order' => 7,
        //         'icon' => 'md-file-text'
        //     ]
        // ]);
        // DB::table('menus')->insert([
        //     [
        //         'display_name' => 'Email-Settings',
        //         'name' => 'core.email-settings',
        //         'url' => route('admin.email-settings.index'),
        //         'permission' => 'core.email-settings.manage',
        //         'package_name' => 'core',
        //         'parent_id' => 0,
        //         'type' => 'primary',
        //         'order' => 7,
        //         'icon' => 'md-settings'
        //     ]
        // ]);
    }
}
