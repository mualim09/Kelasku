<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PrivateComments', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('author');
            $table->string('id_mark');
            $table->timestamps();

            // $table->foreign('id_mark')->references('marks')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('private_comments');
    }
}
