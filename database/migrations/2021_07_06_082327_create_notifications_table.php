<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('read')->nullable();
            $table->date('date')->nullable();
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->integer('notificationable_id')->nullable();
            $table->string('notificationable')->nullable();
            $table->unsignedBigInteger('installment_id');
            $table->foreign('installment_id')->references('id')->on('installements')->onDelete('cascade');
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
        Schema::dropIfExists('notifications');
    }
}
