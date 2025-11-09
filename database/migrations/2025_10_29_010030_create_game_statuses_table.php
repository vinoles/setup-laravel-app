<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('game_statuses', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('code', 50)->unique();
            $table->string('name', 120);
            $table->timestampsTz();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_statuses');
    }
};
