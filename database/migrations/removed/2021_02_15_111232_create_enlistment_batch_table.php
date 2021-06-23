<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnlistmentBatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enlistment_batch', function (Blueprint $table) {
            
            $table->id('no');
            $table->date('enl_startDate');
            $table->date('enl_endDate');
            $table->unsignedBigInteger('startedBy');
            $table->foreign('startedBy')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enlistment_batch');
    }
}
