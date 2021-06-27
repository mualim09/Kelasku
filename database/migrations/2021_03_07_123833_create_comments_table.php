<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('author');
            // $table->string('announcement_id');
            
            $table->string('data_comment');
            $table->string('classwork_id');
            $table->timestamps();

            // $table->foreign('announcement_id')->references('id')->on('announcements');
            // $table->foreign('mark_id')->references('id')->on('marks');
            // $table->foreign('classwork_id')->references('id')->on('classworks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
