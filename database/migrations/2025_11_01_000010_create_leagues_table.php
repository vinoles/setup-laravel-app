<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->foreignId('federation_id')
                ->nullable()
                ->constrained('federations')
                ->nullOnDelete();

            $table->foreignId('sport_id')
                ->nullable()
                ->constrained('sports')
                ->nullOnDelete();

            $table->string('name', 150);
            $table->string('country', 80)->nullable();
            $table->timestampsTz();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('leagues');
    }
};
