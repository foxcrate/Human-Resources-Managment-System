<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasts', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->date('date');
            $table->integer('p_totalSalary');
            $table->decimal('p_hoursLated',5,2);
            $table->integer('p_daysAttended');
            $table->integer('p_daysAbsented');
            $table->decimal('p_hoursWorked', 5, 2);
            $table->decimal('p_hoursNotWorked', 5, 2);

            $table->integer('p_rewards')->default(0);
            $table->integer('p_incentives')->default(0);
            $table->integer('p_overTime')->default(0);
            $table->integer('p_naughty')->default(0);
            $table->integer('p_otherMoney')->default(0);
            $table->string('p_otherMoneyExplanation')->default("ok");
            $table->integer('p_salaryToTake');
           

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasts');
    }
}
