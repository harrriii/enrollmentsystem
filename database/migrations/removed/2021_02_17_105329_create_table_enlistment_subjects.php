<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEnlistmentSubjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_enlistment_subjects', function (Blueprint $table) {
            $table->id('no');
            $table->string('subject_code');
            $table->date('enl_endDate');
            $table->unsignedBigInteger('enlistment_batch');
            $table->foreign('enlistment_batch')->references('no')->on('enlistment_batch')->onDelete('cascade');
            $table->foreign('enlistment_batch')->references('no')->on('enlistment_batch')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_enlistment_subjects');
    }
}
