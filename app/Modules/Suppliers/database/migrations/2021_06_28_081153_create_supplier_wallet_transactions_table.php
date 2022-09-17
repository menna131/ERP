<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierWalletTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_wallet_id')->constrained('supplier_wallets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->tinyInteger('reason')->comment('1=>deposite,2=>withdraw,3=>depit,4=>paymentOut,5=>paymentIn');
            $table->date('transaction_date');
            $table->string('supplier_wallet_transactionable_type');
            $table->bigInteger('supplier_wallet_transactionable_id');
            $table->boolean('transaction_status');
            $table->decimal('amount',10,2);
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
        Schema::dropIfExists('supplier_wallet_transactions');
    }
}
