<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersPastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers_pasts', function (Blueprint $table) {
            $table->unsignedBigInteger('worker_id');
            $table->unsignedBigInteger('past_id');

            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
            $table->foreign('past_id')->references('id')->on('pasts')->onDelete('cascade');

            $table->primary(['worker_id','past_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers_pasts');
    }
}
