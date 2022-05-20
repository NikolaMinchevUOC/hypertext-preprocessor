<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id('id_exam');
            $table->unsignedBigInteger('id_class');
            $table->unsignedBigInteger('id_student');
            $table->string('name');
            $table->float('mark');
            $table->timestamps();

            $table->foreign('id_class')->references('id_class')->on('classes');
            $table->foreign('id_student')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
