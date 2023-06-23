<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('poomses', function (Blueprint $table) {
            $table->id();
            $table->string('codified_fight');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('poomse_technique', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Poomse::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Technique::class)->constrained()->cascadeOnDelete();
            $table->primary(['poomse_id', 'technique_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poomse_technique');
        Schema::dropIfExists('poomses');
    }
};
