<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Add root user
        $user = User::create(
            [
                'id' 		=> 	1,
                'name'	=>	'root_user',
                'email'		=>	'admin@maroon.lab',
                'phone_number' => '01783511730',
                'password'	=>	Hash::make('12345678')
            ]
        );
        //Add root user
        $user = User::create(
            [
                'id' 		=> 	2,
                'name'	=>	'dev_user',
                'email'		=>	'admin@fsrelbd.com',
                'phone_number' => '01989091217',
                'password'	=>	Hash::make('12345678')
            ]
        );
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'admin']);
        //$role->givePermissionTo(Permission::all());

        $root_user = User::find(1);
        $root_user->assignRole('super-admin');

        $admin_user = User::find(2);
        $admin_user->assignRole('admin');
    }
}
