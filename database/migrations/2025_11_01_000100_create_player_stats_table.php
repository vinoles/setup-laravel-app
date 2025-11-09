<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('player_stats', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->foreignId('game_id')->constrained('games')->cascadeOnDelete();
            $table->foreignId('player_id')->constrained('players')->cascadeOnDelete();
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete();

            $table->smallInteger('minutes')->default(0);
            $table->smallInteger('rating')->nullable();
            $table->jsonb('metrics')->nullable();
            $table->timestampsTz();

            $table->unique(['game_id', 'player_id']);
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('player_stats');
    }
};
