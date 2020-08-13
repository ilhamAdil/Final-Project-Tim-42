<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationToCommentsQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments_questions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('questions_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('questions_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments_questions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['questions_id']);
            $table->dropColumn(['user_id']);
            $table->dropColumn(['questions_id']);
        });
    }
}
