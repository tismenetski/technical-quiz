<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('original_id');
            $table->string('question');
            $table->string('multiple_answer_question');
            $table->json('answers');
            $table->json('correct_answers');
            $table->text('tip')->nullable();
            $table->text('explanation')->nullable();
            $table->text('description')->nullable();
            $table->enum('difficulty',['Easy','Medium','Hard']);
            $table->string('category');
            $table->json('tags')->nullable();
            $table->bigInteger('category_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('categories');
//            $table->bigInteger('tag_id')->unsigned();
//            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
