<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('game_referees', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->foreignId('game_id')->constrained('games')->cascadeOnDelete();
            $table->foreignId('referee_id')->constrained('referees')->cascadeOnDelete();
            $table->foreignId('role_id')->constrained('referee_roles')->restrictOnDelete();
            $table->timestampsTz();

            $table->unique(['game_id', 'referee_id']);
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('game_referees');
    }
};
