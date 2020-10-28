<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('sales_man_id');
            $table->unsignedBigInteger('product_id');
            $table->double('total_amount')->default(0);
            $table->double('damage_value')->default(0);
            $table->double('claim')->default(0);
            $table->double('net_amount')->default(0);
            $table->double('due')->default(0);
            $table->double('cash')->default(0);
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
        Schema::dropIfExists('daily_details');
    }
}
