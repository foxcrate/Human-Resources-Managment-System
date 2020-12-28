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
            $table->string('education');
            $table->date('graduationDate');
            $table->date('workStartDate');
            $table->string('mobileNumber');
            $table->string('address');
            $table->string('email');
            $table->integer('workDays');
            $table->integer('GPA');
            $table->date('workApplyDate');
            $table->string('homeTelephone');
            $table->string('mobileNumber2');
            $table->bigInteger('nationalID');
            $table->bigInteger('insuranceID');
            $table->integer('monthWorkedDays');
            $table->integer('monthWorkedHours');

            $table->integer('totalSalary');

            $table->integer('dayPaid');
            $table->integer('hourPaid');
            $table->integer('monthlyShouldWorkedHours');
            $table->time('attendanceTime');
            $table->time('leaveTime');
            $table->time('lateTime');
            $table->integer('daysAttended');
            $table->integer('daysAbsented');
            $table->integer('daysLated');

            $table->integer('basicSalary');

            $table->integer('attendanceCompensation');
            $table->integer('orderCompensation');
            $table->integer('transportationCompensation');

            $table->integer('rewards');
            $table->integer('incentives');
            $table->integer('overTime');
            $table->integer('dayAbsencePay');
            $table->integer('dayLatePay');
            $table->integer('naughtyPay');
            $table->integer('insurancePay');
            $table->integer('taxesPay');
            $table->integer('otherPays');
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
