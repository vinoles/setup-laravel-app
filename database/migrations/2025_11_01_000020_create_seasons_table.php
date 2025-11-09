<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->foreignId('league_id')->constrained('leagues')->cascadeOnDelete();
            $table->string('name', 80);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->foreignId('status_id')
                ->constrained('season_statuses')
                ->restrictOnDelete(); // planned, active, finished

            $table->timestampsTz();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('seasons');
    }
};
