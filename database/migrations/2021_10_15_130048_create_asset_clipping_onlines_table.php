<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetClippingOnlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_clipping_onlines', function (Blueprint $table) {
            $table->id();

            $table->foreignId('client_id')->nullable();
            $table->date('start_date_news')->nullable();
            $table->date('end_date_news')->nullable();
            $table->date('date')->nullable();
            $table->longText('content')->nullable();
            
            $table->foreignId('created_by')->nullable();
            $table->foreignId('updated_by')->nullable();
            $table->foreignId('deleted_by')->nullable();
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
        Schema::dropIfExists('asset_clipping_onlines');
    }
}
