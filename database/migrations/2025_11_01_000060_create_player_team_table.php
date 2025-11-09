<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('player_team', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->foreignId('player_id')->constrained('players')->cascadeOnDelete();
            $table->foreignId('team_season_id')->constrained('teams_seasons')->cascadeOnDelete();

            $table->string('jersey_number', 10)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestampsTz();

            $table->unique(['player_id', 'team_season_id']);
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('player_team');
    }
};
