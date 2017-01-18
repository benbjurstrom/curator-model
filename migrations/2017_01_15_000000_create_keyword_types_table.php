<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use BenBjurstrom\CuratorModel\KeywordType;

class CreateKeywordTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyword_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
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
        file_put_contents(__dir__ . '/../seeds/json/keyword-types.json', KeywordType::all()->toJson(JSON_PRETTY_PRINT));
        Schema::dropIfExists('keyword_types');
    }
}
