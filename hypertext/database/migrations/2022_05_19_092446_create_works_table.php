<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id('id_work');
            $table->unsignedBigInteger('id_class');
            $table->unsignedBigInteger('id_student');
            $table->string('name');
            $table->float('mark', 10, 2);
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
        Schema::dropIfExists('works');
    }
}
