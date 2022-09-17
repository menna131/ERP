<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppCapitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_capitals', function (Blueprint $table) {
            $table->id();
            $table->date('month');
            $table->decimal('capital', $precision = 10, $scale = 2);
            $table->decimal('monthly_profit', $precision = 10, $scale = 2);
            $table->decimal('capital_after_divided', $precision = 10, $scale = 2)->nullable();
            $table->string('money_percent_type')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('app_capitals');
    }
}
