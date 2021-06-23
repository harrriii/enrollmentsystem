<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantEmploymentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_employment_info', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('student_id');
            $table->text('employment_type');
            $table->text('company');
            $table->text('address');
            $table->text('position');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicant_employment_info');
    }
}
