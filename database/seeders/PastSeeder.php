<?php

namespace Database\Seeders;

use App\Models\Past;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $past1= new Past();
        
        $past1->date=Carbon::parse('2020-07-04');
        $past1->p_totalSalary = 4000;
        $past1->p_hoursLated=0.0;
        $past1->p_daysAttended=22;
        $past1->p_daysAbsented=0;
        $past1->p_hoursWorked=198.0;
        $past1->p_hoursNotWorked=0.0;
        $past1->p_salaryToTake=4000;

        $past1->save();
    }
}
