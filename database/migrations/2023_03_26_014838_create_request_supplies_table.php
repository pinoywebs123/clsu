<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_supplies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("supply_id")->index();
            $table->bigInteger('requester_id')->index();
            $table->bigInteger('approved_by')->index()->nullable();
            $table->integer('quantity');
            $table->bigInteger('status_id');
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
        Schema::dropIfExists('request_supplies');
    }
};
