<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCampusIdToApplicantStudInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicant_stud_info', function (Blueprint $table) {

            $table->dropColumn('campus_location');
            $table->dropColumn('campus_name');
            $table->unsignedBigInteger('campus_id');
            $table->foreign('campus_id')->references('id')->on('campus_list')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applicant_stud_info', function (Blueprint $table) {
            //
        });
    }
}
