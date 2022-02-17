<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryDataCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_data_collections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_collection_id');
            $table->bigInteger('total_data');
            $table->integer('new_data');
            $table->date('date');
            $table->integer('missing_data');
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
        Schema::dropIfExists('history_data_collections');
    }
}
