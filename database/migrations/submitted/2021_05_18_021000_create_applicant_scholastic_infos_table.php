<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantScholasticInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_scholastic_info', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('student_id');
            $table->text('school_name');
            $table->text('school_address');
            $table->year('year_attended_start');
            $table->year('year_attended_end');
            $table->integer('order_num');
            $table->text('level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicant_scholastic_info');
    }
}
