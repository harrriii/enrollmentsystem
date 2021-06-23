<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSchoolIdToStudentIdForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_id_form', function (Blueprint $table) {
            $table->dropColumn('school_of');
            $table->unsignedBigInteger('school_id');
            $table->foreign('school_id')->references('id')->on('school_list')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_id_form', function (Blueprint $table) {
            //
        });
    }
}
