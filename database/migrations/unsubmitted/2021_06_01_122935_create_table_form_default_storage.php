<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFormDefaultStorage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('default_storage', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no');
            $table->string('tc');
            $table->string('cc');
            $table->string('value');
            $table->string('label');
            $table->unsignedBigInteger('form_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('default_storage');
    }
}
