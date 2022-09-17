<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 1000);
            $table->string('type', 255);
            $table->boolean('status');
            $table->string('create_status', 255);
            $table->string('note', 1000);
            $table->decimal('discount', 8, 2, false);
            $table->decimal('total', 8, 2, false);
            $table->dateTime('receive_date');
            $table->dateTime('order_date');
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
        Schema::dropIfExists('sales');
    }
}
