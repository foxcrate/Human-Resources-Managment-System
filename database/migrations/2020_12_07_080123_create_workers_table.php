<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('delete')->default(0);
            $table->timestamps();
            $table->string('name');
            $table->string('department');
            
            $table->string('education');
            $table->date('graduationDate');
            $table->date('workStartDate');
            $table->bigInteger('mobileNumber');
            $table->string('address');
            $table->string('email');
            $table->decimal('GPA',5,2);
            $table->date('workApplyDate');
            $table->bigInteger('homeTelephone');
            $table->bigInteger('anotherMobileNumber');
            $table->bigInteger('nationalID');
            $table->bigInteger('insuranceID');

            $table->integer('totalSalary');
            $table->decimal('hourPay',5,2);

            $table->time('shouldArriveTime');
            $table->time('shouldLeaveTime');
            $table->decimal('hoursLated',5,2)->default(0);

            $table->string('holidays'); /////////////
            $table->integer('daysAttended')->default(0);
            $table->integer('daysAbsented')->default(0);

            $table->decimal('dailyShouldWorkedHours',5,2); ////////
            $table->decimal('hoursWorked', 5, 2)->default(0);
            $table->decimal('hoursNotWorked', 5, 2)->default(0);

            $table->integer('basicSalary');

            $table->integer('attendanceCompensation');
            $table->integer('orderCompensation');
            $table->integer('transportationCompensation');

            $table->integer('annualVacations');
            $table->integer('regularVacation');
            $table->integer('casualVacation');

            $table->integer('rewards')->default(0);
            $table->integer('incentives')->default(0);
            $table->decimal('overTime',5,2)->default(0);

            $table->decimal('dayAbsencePay',5,2);
            $table->decimal('latePay',5,2);
            $table->decimal('naughty',5,2)->default(0);
            $table->integer('insurancePay');
            $table->integer('taxesPay');
            $table->integer('otherMoney')->default(0);
            $table->string('otherMoneyExplanation')->default("ok");
            $table->integer('salaryToTake')->default(0);

            $table->integer('spare')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
}
