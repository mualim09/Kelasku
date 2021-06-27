<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->date('due_date')->nullable();
            $table->float('max_points');
            $table->string('file')->nullable();
            $table->float('points')->nullable();
            $table->string('classroom_id');
            $table->string('author');
            $table->timestamps();

            // $table->foreign('classroom_id')->references('id')->on('classrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}
