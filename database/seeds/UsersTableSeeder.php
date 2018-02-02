<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $users = factory(\App\User::class, 5)->create();
        $role_admin = Role::where('name', 'ROLE_ADMIN')->first();

        $admin = new User();
        $admin->name = 'Indah Dianingsih';
        $admin->email = 'indah@gmail.com';
        $admin->password = bcrypt('secret');
        $admin->age = "1998-08-18";
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
