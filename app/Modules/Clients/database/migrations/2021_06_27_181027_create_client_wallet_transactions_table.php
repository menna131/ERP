<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientWalletTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_wallet_id')->constrained('client_wallets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('reason')->comment('1=>deposite,2=>withdraw,3=>depit,4=>paymentOut,5=>paymentIn');
            $table->date('transaction_date');
            $table->string('client_wallet_transactionable_type');
            $table->bigInteger('client_wallet_transactionable_id');
            $table->boolean('transaction_status');
            $table->double('amount',10,2);
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
        Schema::dropIfExists('client_wallet_transactions');
    }
}
