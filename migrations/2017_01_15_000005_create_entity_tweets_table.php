<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_tweets', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('tweet_id');
            $table->integer('entity_id');
            $table->integer('keyword_id');
            $table->timestamps();

            $table->foreign('tweet_id')->references('id')->on('tweets');
            $table->foreign('entity_id')->references('id')->on('entities');
            $table->foreign('keyword_id')->references('id')->on('entity_keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity_tweets');
    }
}
