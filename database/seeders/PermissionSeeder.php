<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$manageUser = new Permission();
        $manageUser->name = 'Manage Users';
        $manageUser->save();

        $createTasks = new Permission();
        $createTasks->name = 'Create Tasks';
        $createTasks->save();*/

        $admination = new Permission();
        $admination->name = 'admination';
        $admination->functions=
        'edit,create,show,salaryDetails,delete,export,search,index,addAttendance,attendanceDetails';
        $admination->save();

    }
}