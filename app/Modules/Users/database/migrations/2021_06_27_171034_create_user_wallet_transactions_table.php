<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWalletTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_wallet_id');
            $table->string('reason')->comment('1=>deposite,2=>withdraw,3=>depit,4=>paymentOut,5=>paymentIn');
            $table->date('transaction_date');
            $table->string('user_wallet_transactionable_type');
            $table->bigInteger('user_wallet_transactionable_id');
            $table->boolean('transaction_status');
            $table->double('amount');
            $table->longText('slug');
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
        Schema::dropIfExists('user_wallet_transactions');
    }
}
