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
    Schema::create('criterias', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nama Kriteria (Harga, Rarity, dll)
        $table->enum('type', ['maximize', 'minimize']); // Sifat kriteria
        $table->float('weight'); // Bobot kriteria
        $table->string('preference_function')->default('usual'); // Tipe fungsi PROMETHEE
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criterias');
    }
};
