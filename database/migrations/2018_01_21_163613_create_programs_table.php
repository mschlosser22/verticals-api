<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned()->index();
            $table->string('school_name');
            $table->integer('vertical_id')->unsigned()->index();
            $table->string('vertical_name');
            $table->integer('subvertical_id')->unsigned()->index();
            $table->string('subvertical_name');
            $table->string('name');
            $table->string('code');
            $table->string('education_level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('programs');
    }
}
