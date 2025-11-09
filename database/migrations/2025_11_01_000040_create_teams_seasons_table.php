<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('teams_seasons', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete();
            $table->foreignId('season_id')->constrained('seasons')->cascadeOnDelete();

            $table->string('group', 50)->nullable();
            $table->smallInteger('seed')->nullable();
            $table->timestampsTz();

            $table->unique(['team_id', 'season_id']);
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('teams_seasons');
    }
};
