<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_wallets', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_paid',10,2);
            $table->decimal('total_pending',10,2);
            $table->tinyInteger('status');
            $table->bigInteger('number_of_transaction');
            $table->decimal('total_value',10,2);
            $table->string('slug');
            $table->foreignId('supplier_id')->constrained('suppliers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
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
        Schema::dropIfExists('supplier_wallets');
    }
}
