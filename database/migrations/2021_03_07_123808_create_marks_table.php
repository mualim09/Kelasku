<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->uuid('id');
            $table->unsignedInteger('student_id');
            $table->string('assignment_id');
            $table->string('classroom_id');
            $table->string('file');
            $table->unsignedInteger('mark_value');
            $table->timestamps();

            // $table->foreign('student_id')->references('id')->on('students');
            // $table->foreign('assignment_id')->references('id')->on('assignments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}
