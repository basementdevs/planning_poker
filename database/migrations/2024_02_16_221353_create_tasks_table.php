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
        Schema::create('tasks', function (Blueprint $table) {
            $table->string('id');
            $table->string('name', 70);
            $table->text('description');
            $table->tinyInteger('story_points')->nullable();
            if (Schema::hasTable('planning_poker')) {
                $table->foreignId('planning_poker_id')
                    ->references('id')
                    ->on('planning_poker')
                    ->nullable()
                    ->constrained();
            }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
