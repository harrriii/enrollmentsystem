<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantStudInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_stud_info', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('student_id');
            $table->text('campus_location');
            $table->text('campus_name');
            $table->text('student_type');
            $table->text('semester');
            $table->year('school_year_start');
            $table->year('school_year_end');
            $table->date('date_of_application');
            $table->text('school_of');
            $table->text('program');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicant_stud_info');
    }
}
