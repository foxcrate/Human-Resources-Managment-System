<?php

namespace Database\Seeders;

use App\Models\Worker;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $worker1 = new Worker();
        $worker1->name = 'أحمد مصطفى';
        $worker1->department ='ويب' ;
        $worker1->education ="كلية الحاسبات والمعلومات جامعة القاهرة" ;
        $worker1->graduationDate = Carbon::parse('2020-07-04');
        $worker1->workStartDate = Carbon::parse('2020-08-06');
        $worker1->mobileNumber =01550307033 ;
        $worker1->address = "الهرم-الجيزة";
        $worker1->email = "ahmedmustafa.pro19@gmail.com";
        $worker1->GPA =2.4 ;
        $worker1->workApplyDate =Carbon::parse('2020-08-04') ;
        $worker1->homeTelephone =0237777777 ;
        $worker1->anotherMobileNumber =015444444444 ;
        $worker1->nationalID =444444444444444;
        $worker1->insuranceID =132221232222 ;
        $worker1->totalSalary = 4000;
        $worker1->hourPay =20.0 ;
        $worker1->shouldArriveTime =Carbon::parse('8:00') ;
        $worker1->shouldLeaveTime =Carbon::parse('5:00') ;
        $worker1->shouldWorkedDays = 22;
        $worker1->shouldWorkedHours = 198.0;
        $worker1->basicSalary =2500 ;
        $worker1->attendanceCompensation =500 ;
        $worker1->orderCompensation =500 ;
        $worker1->transportationCompensation =500 ;
        $worker1->annualVacations =19 ;
        $worker1->regularVacation = 8;
        $worker1->casualVacation = 8;
        $worker1->dayAbsencePay =0 ;
        $worker1->latePay =0 ;
        $worker1->insurancePay =0 ;
        $worker1->taxesPay = 0;
        
        $worker1->save();

    }
}