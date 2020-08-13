<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsHasQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_has_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('questions_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('questions_id')->references('id')->on('questions');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_has_questions');
    }
}
