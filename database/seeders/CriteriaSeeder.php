<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criteria;

class CriteriaSeeder extends Seeder
{
    public function run(): void
    {
        // SQA Guard: Kosongkan/bersihkan tabel kriteria lama agar tidak duplikat
        Criteria::truncate();

        // Susunan 8 Kriteria Final (Bobot setara = 1.0)
        $kriteriaFinal = [
            ['name' => 'Harga', 'type' => 'minimize', 'weight' => 1.0, 'preference_function' => 'linear'],
            ['name' => 'Kategori Rarity Skin', 'type' => 'maximize', 'weight' => 1.0, 'preference_function' => 'usual'],
            ['name' => 'Model Skin', 'type' => 'maximize', 'weight' => 1.0, 'preference_function' => 'usual'],
            ['name' => 'Portrait Skin', 'type' => 'maximize', 'weight' => 1.0, 'preference_function' => 'usual'],
            ['name' => 'Animasi Entrance Skin', 'type' => 'maximize', 'weight' => 1.0, 'preference_function' => 'usual'],
            ['name' => 'In-Game Effect', 'type' => 'maximize', 'weight' => 1.0, 'preference_function' => 'usual'],
            ['name' => 'Tingkat Preferensi Hero', 'type' => 'maximize', 'weight' => 1.0, 'preference_function' => 'usual'],
            ['name' => 'Status Ketersediaan Skin', 'type' => 'maximize', 'weight' => 1.0, 'preference_function' => 'usual'],
        ];

        // Masukkan data ke database lewat Model
        foreach ($kriteriaFinal as $kriteria) {
            Criteria::create($kriteria);
        }
    }
}