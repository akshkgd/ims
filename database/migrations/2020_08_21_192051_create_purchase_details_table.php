<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned();
            $table->date('date_of_purchase');
            $table->integer('supplier_id')->unsigned();
            $table->date('date_of_delivery')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('purchase_order_number')->unique();
            $table->string('head')->nullable();
            $table->integer('quantity_purchased')->unsigned();
            $table->float('rate_per_unit')->unsigned()->nullable();
            $table->double('total')->unsigned()->nullable();
            $table->char('process_adopted');
            $table->char('purpose_of_purchase');
            $table->integer('department_id')->nullable();
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
        Schema::dropIfExists('purchase_details');
    }
}
