<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('unit_id')->unsigned();
            $table->bigInteger('lecturer_id')->unsigned()->nullable();
            $table->string('unit_name');
            $table->string('unit_code');
            $table->string('lecturer_name')->nullable();
            $table->string('course_academic_year');
            $table->string('course_name');
            $table->string('status')->default('new');

            $table->timestamps();

            
            $table->foreign('lecturer_id')->references('id')->on('users');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lectures');
    }
}
