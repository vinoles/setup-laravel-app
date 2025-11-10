<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('federations', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('name', 150);
            $table->string('type', 60)->nullable();
            $table->string('acronym', 20)->nullable();
            $table->string('country', 80)->nullable();
            $table->smallInteger('foundation_year')->nullable();
            $table->string('website', 255)->nullable();
            $table->string('email', 120)->nullable();
            $table->timestampsTz();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('federations');
    }
};
