<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('unit_id')->unsigned();
            $table->bigInteger('lecturer_id')->unsigned()->nullable();
            $table->string('unit_name');
            $table->string('unit_code');
            $table->string('lecturer_name')->nullable();
            $table->string('course_academic_year');
            $table->string('course_name');
            $table->integer('day')->nullable();
            $table->integer('session')->nullable();
            $table->bigInteger('room_id')->nullable()->unsigned();
            $table->string('room_number')->nullable();
            $table->string('block_name')->nullable();

            
            $table->timestamps();

            $table->foreign('lecturer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
