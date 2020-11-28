<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandPromotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_promoters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('brand_promoter_id')->unsigned();
            $table->string('customer_name');
            $table->string('customer_address');
            $table->string('sold_status');
            $table->string('device_quantity');
            $table->string('device_serial_number');
            $table->string('source_of_lead');
            $table->string('brand_promoter_remarks');
            $table->string('admin_remarks')->nullable();

            $table->timestamps();
            $table->foreign('brand_promoter_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand_promoters');
    }
}
