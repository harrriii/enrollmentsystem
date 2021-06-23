<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantEmergencyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_emergency_contact', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('student_id');
            $table->text('name');
            $table->text('relationship');
            $table->text('address');
            $table->text('mobile_no');
            $table->text('signature');
            $table->text('how_did_you_learn_mlqu');
            $table->text('others')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicant_emergency_contact');
    }
}
