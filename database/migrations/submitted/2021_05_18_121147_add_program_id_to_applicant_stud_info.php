<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProgramIdToApplicantStudInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicant_stud_info', function (Blueprint $table) {
            $table->dropColumn('program');
            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')->references('id')->on('program_list')->onDelete('cascade');
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
