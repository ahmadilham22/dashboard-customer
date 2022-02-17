<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetInsightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_insights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name', 191);
            $table->string('category', 191)->nullable();
            $table->text('description')->nullable();
            $table->integer('month')->nullable();
            $table->year('year')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset_insights');
    }
}
