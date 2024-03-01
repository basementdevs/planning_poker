<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trello_settings', function (Blueprint $table) {
            $table->id();
            $table->string('api_key');
            $table->string('api_token');
            $table->unsignedBigInteger('setting_id');
            $table->foreign('setting_id')->references('id')->on('settings');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trello_settings');
    }
};
