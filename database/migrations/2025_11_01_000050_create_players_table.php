<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique()->default(DB::raw('gen_random_uuid()'));

            $table->string('first_name', 80);
            $table->string('last_name', 80);
            $table->date('birthdate')->nullable();
            $table->string('nationality', 80)->nullable();
            $table->string('position', 40)->nullable();
            $table->integer('height_cm')->nullable();
            $table->integer('weight_kg')->nullable();
            $table->timestampsTz();
            $table->softDeletesTz();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
