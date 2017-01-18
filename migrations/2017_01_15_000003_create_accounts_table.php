<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use BenBjurstrom\CuratorModel\Account;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('name')->nullable();
            $table->string('bio')->nullable();
            $table->integer('affiliation_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('entity_id')->nullable();
            $table->timestamps();


            $table->foreign('affiliation_id')->references('id')->on('affiliations');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('entity_id')->references('id')->on('entities');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        file_put_contents(__dir__ . '/../seeds/json/accounts.json', Account::all()->toJson(JSON_PRETTY_PRINT));
        Schema::dropIfExists('accounts');
    }
}
