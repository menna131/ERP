<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installements', function (Blueprint $table) {
            $table->id();
            $table->decimal('paid_amount', $precision = 10, $scale = 2)->nullable();
            $table->decimal('installement_period', $precision = 10, $scale = 2)->nullable();
            $table->integer('installementable_id')->nullable();
            $table->string('installementable_type')->nullable();
            $table->decimal('down_payment', $precision = 10, $scale = 2)->nullable();
            $table->integer('per')->nullable();
            $table->date('start_date')->nullable();
            $table->string('installment_type')->nullable();
            $table->integer('no_transaction')->nullable();
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
        Schema::dropIfExists('installements');
    }
}
