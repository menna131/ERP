<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_supplier', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained();
            $table->foreignId('supplier_id')->constrained();
            $table->string('code', 255);
            $table->decimal('purchase_price', 8, 2, false);
            $table->decimal('sale_price', 8, 2, false);
            $table->integer('quantity');
            $table->string('madein',30)->nullable();
            $table->enum('create_status',['OPENING_STOCK','EXCEL','PURCHASE']);
            $table->timestamps();
            $table->softDeletes();
            $table->primary(['product_id', 'supplier_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_supplier');
    }
}
