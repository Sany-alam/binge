<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('ticket_no')->nullable();
            $table->string('customer_phone_no');
            $table->string('customer_address');
            $table->string('source_of_lead');
            $table->string('customer_instruction')->nullable();
            $table->string('admin_instruction')->nullable();
            $table->integer('assign_delivery_partner_status')->default("0");
            $table->integer('order_received_status')->default("0");
            $table->integer("order_complete_status")->default("0");
            $table->bigInteger('order_generated_by')->unsigned();
            $table->bigInteger('order_completed_by')->unsigned()->nullable();
            $table->bigInteger('delivery_partner')->unsigned()->nullable();
            $table->string("order_generated_date_time");
            $table->string('order_completed_date_time')->nullable();
            $table->string('admin_remarks')->nullable();
            $table->string('order_generator_remarks')->nullable();
            $table->string('delivery_partner_remarks')->nullable();
            $table->timestamps();

            $table->foreign('order_generated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_completed_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('delivery_partner')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
