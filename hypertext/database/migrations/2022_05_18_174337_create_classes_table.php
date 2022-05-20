<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id('id_class');
            $table->unsignedBigInteger('id_teacher');
            $table->unsignedBigInteger('id_course');
            $table->unsignedBigInteger('id_schedule');
            $table->string('name');
            $table->string('color');
            $table->timestamps();

            $table->foreign('id_teacher')->references('id')->on('users');
            $table->foreign('id_course')->references('id_course')->on('courses');
            $table->foreign('id_schedule')->references('id_schedule')->on('schedules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
