<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique();
            $table->string('slug', 1000);
            $table->string('code', 255);
            $table->string('desc', 1000)->nullable();
            $table->decimal('primary_purchase_price', 8, 2, false)->nullable();
            $table->decimal('primary_sale_price', 8, 2, false)->nullable();
            $table->foreignId('category_id')->unsigned()->nullable()->constrained()->onUpdate('set null')->onDelete('set null');
            $table->foreignId('brand_id')->unsigned()->nullable()->constrained()->onUpdate('set null')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
