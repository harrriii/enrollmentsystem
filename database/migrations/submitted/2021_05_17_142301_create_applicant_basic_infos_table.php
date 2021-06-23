<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantBasicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_basic_info', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('student_id');
            $table->text('first_name');
            $table->text('middle_name')->nullable();
            $table->text('last_name');
            $table->text('suffix');
            $table->text('nationality');
            $table->text('religion');
            $table->date('birth_date');
            $table->text('age');
            $table->text('civil_status');
            $table->text('gender');
            $table->text('birth_place');
            $table->text('mobile_no');
            $table->text('email_address');
            $table->char('if_married', 1);
            $table->text('name_of_spouse')->nullable();
            $table->text('acr_no')->nullable();
            $table->text('pass_no')->nullable();
            $table->text('no_of_siblings');
            $table->text('id_picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicant_basic_info');
    }
}
