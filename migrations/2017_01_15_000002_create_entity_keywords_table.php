<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use BenBjurstrom\CuratorModel\EntityKeyword;

class CreateEntityKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_keywords', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entity_id');
            $table->string('keyword');
            $table->integer('keyword_type_id');
            $table->timestamps();

            $table->foreign('entity_id')->references('id')->on('entities');
            $table->foreign('keyword_type_id')->references('id')->on('keyword_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        file_put_contents(__dir__ . '/../seeds/json/entity-keywords.json', EntityKeyword::all()->toJson(JSON_PRETTY_PRINT));
        Schema::dropIfExists('entity_keywords');
    }
}
