<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_domains', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('buy_from')->nullable();
            $table->date('buy_date')->nullable();
            $table->date('expired_date')->nullable();
            $table->float('price', 18, 2)->nullable();
            $table->float('value', 18, 2)->nullable();
            
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
        Schema::dropIfExists('asset_domains');
    }
}
