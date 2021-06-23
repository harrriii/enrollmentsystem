<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantAddressInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_address_info', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('student_id');
            $table->text('street_no')->nullable();
            $table->text('street')->nullable();
            $table->text('barangay');
            $table->text('subdivision')->nullable();
            $table->text('city');
            $table->text('zip_code');
            $table->text('address_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicant_address_info');
    }
}
