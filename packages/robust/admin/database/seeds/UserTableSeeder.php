<?php
use Robust\Admin\Models\Role;
use Robust\Admin\Models\User;
use Robust\Admin\Models\Permission;
use Robust\Core\Helpers\PermissionHelper;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        //Get all user actions
        $all_permissions = (new PermissionHelper)->get_all_permissions();

        //Create a new role
        $role = Role::updateOrCreate(['name'=>'Administrator'],[
            'name' => 'Administrator'
        ]);

        foreach ($all_permissions as $package_name => $permissions) {

            if (is_null($permissions)) {
                continue;
            }

            foreach ($permissions as $action => $display_name) {
                $permission = Permission::updateOrCreate(['name' => $action],[
                    "name" => $action,
                    "display_name" => $display_name,
                    "package_name" => $package_name
                ]);
                if($permission->wasRecentlyCreated){
                    $role->permissions()->attach($permission->id);
                }

            }
        }

        $users = [
            [
                'id' => 1,
                'email' => 'info@robustitconcepts.com',
                'password' => Hash::make('12345678'),
                'first_name' => 'Super',
                'last_name' => ' User',
                'user_name' => 'super_user',
                'created_at' => Carbon\Carbon::now()
            ]
        ];

        foreach ($users as $user) {
            $user = User::updateOrCreate(['id'=>1],$user);
            if($user->wasRecentlyCreated){
                $user->roles()->attach($role->id);
            }

        }

        Role::updateOrCreate(['name'=>'User'],['name' => 'User']);
    }
}
