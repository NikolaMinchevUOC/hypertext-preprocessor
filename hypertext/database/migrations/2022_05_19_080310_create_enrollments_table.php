<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id('id_enrollment');
            $table->unsignedBigInteger('id_student');
            $table->unsignedBigInteger('id_course');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('id_student')->references('id')->on('users');
            $table->foreign('id_course')->references('id_course')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
}
