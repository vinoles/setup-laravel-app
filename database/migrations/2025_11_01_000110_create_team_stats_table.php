<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('team_stats', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->foreignId('game_id')->constrained('games')->cascadeOnDelete();
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete();

            $table->jsonb('metrics')->nullable();
            $table->timestampsTz();

            $table->unique(['game_id', 'team_id']);
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('team_stats');
    }
};
