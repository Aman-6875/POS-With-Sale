<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesMenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_men', function (Blueprint $table) {
            $table->increments('sales_man_id');
            $table->string('sales_man_name');
            $table->string('sales_man_email')->nullable();
            $table->string('sales_man_image')->nullable();
            $table->string('sales_man_phone')->nullable();
            $table->string('sales_man_address')->nullable();
           
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
        Schema::dropIfExists('sales_men');
    }
}
