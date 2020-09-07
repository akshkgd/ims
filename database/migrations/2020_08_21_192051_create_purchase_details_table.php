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
            $table->string('invoice_number', 20);
            $table->string('purchase_order_number', 20)->unique();
            $table->integer('quantity_purchased')->unsigned();
            $table->float('rate_per_unit')->unsigned();
            $table->double('total')->unsigned();
            $table->char('process_adopted');
            $table->integer('purpose_of_purchase')->unsigned();
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
