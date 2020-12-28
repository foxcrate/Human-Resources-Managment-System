<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developer = Role::where('name','Web Developer')->first();
        $manager = Role::where('name', 'Project Manager')->first();
        $createTasks = Permission::where('name','Create Tasks')->first();
        $manageUsers = Permission::where('name','Manage Users')->first();

        $user1 = new User();
        $user1->name = 'Fawzy';
        $user1->email = 'a@a';
        $user1->password = bcrypt('123456789');
        $user1->save();
        $user1->roles()->attach($manager);
        $user1->permissions()->attach($manageUsers);


        $user2 = new User();
        $user2->name = 'Gamal';
        $user2->email = 'g@g';
        $user2->password = bcrypt('987654321');
        $user2->save();
        $user2->roles()->attach($developer);
        $user2->permissions()->attach($createTasks);

    }
}
