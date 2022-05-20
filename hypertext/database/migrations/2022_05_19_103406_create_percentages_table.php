<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePercentagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('percentages', function (Blueprint $table) {
            $table->id('id_percentage');
            $table->unsignedBigInteger('id_course');
            $table->unsignedBigInteger('id_class');
            $table->float('continuous_assessment', 10, 2);
            $table->float('exams', 10, 2);
            $table->timestamps();

            $table->foreign('id_course')->references('id_course')->on('courses');
            $table->foreign('id_class')->references('id_class')->on('classes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('percentages');
    }
}
