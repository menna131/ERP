<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('open_account')->nullable();
            $table->enum('preferred_language',['en','ar',null])->nullable();
            $table->string('preferred_theme')->nullable()->comment('0 => system default; 1 => light; 2 => dark');
            $table->tinyInteger('status')->comment('0 => no users (default); 1 => super admin has been completed; 2 => email verification; 3 => wallet , opening stok => 4');
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
        Schema::dropIfExists('settings');
    }
}
