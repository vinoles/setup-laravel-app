<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->string('name', 120);
            $table->string('short_name', 20)->nullable();
            $table->string('city', 80)->nullable();
            $table->string('logo_path', 255)->nullable();
            $table->timestampsTz();
            $table->softDeletesTz();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
