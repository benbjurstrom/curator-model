<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use BenBjurstrom\CuratorModel\Entity;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entity_type_id');
            $table->integer('parent_entity_id')->nullable();
            $table->string('name');
            $table->timestamps();

            $table->foreign('entity_type_id')->references('id')->on('entity_types');
            $table->foreign('parent_entity_id')->references('id')->on('entities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        file_put_contents(__dir__ . '/../seeds/json/entities.json', Entity::all()->toJson(JSON_PRETTY_PRINT));
        Schema::dropIfExists('entities');
    }
}
