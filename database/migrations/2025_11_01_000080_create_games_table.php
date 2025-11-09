<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->foreignId('season_id')->constrained('seasons')->cascadeOnDelete();
            $table->foreignId('home_team_id')->constrained('teams')->cascadeOnDelete();
            $table->foreignId('away_team_id')->constrained('teams')->cascadeOnDelete();

            $table->timestampTz('kickoff_at')->nullable();
            $table->string('venue', 120)->nullable();

            $table->foreignId('status_id')
                ->constrained('game_statuses')
                ->restrictOnDelete();

            $table->smallInteger('home_score')->default(0);
            $table->smallInteger('away_score')->default(0);
            $table->smallInteger('round')->nullable();
            $table->string('stage', 60)->nullable();
            $table->timestampsTz();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
