<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retailers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('retailer_id')->unsigned();
            $table->string("retailer_name");
            $table->string("shop_number");
            $table->string("zone");
            $table->string("market_name");
            $table->string("market_address");
            $table->string("status");
            $table->string("interest_level");
            $table->string('last_visit_date');
            $table->string("total_device_left");
            $table->string("total_device_sold");
            $table->string("source");
            $table->string("retailer_remarks");
            $table->string("admin_remarks")->nullable();
            $table->timestamps();
            $table->foreign('retailer_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retailers');
    }
}
