<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Libraries\PrometheeLibrary; // Panggil library di sini

class SkinRecommendationController extends Controller
{
    public function hitungRekomendasi(Request $request)
    {
        $daftarSkin = $request->input('alternatives'); 
        $semuaKriteria = Criteria::all();

        if (!$daftarSkin || count($daftarSkin) < 2) {
            return response()->json([
                'status' => 'error',
                'message' => 'Bandingkan minimal 2 skin agar sistem bisa menghitung peringkatnya.'
            ], 400);
        }

        // MEMAKAI LIBRARY: Instansiasi objek dari Library PROMETHEE
        $promethee = new PrometheeLibrary($daftarSkin, $semuaKriteria);
        $hasilPeringkat = $promethee->runCalculation();

        return response()->json([
            'status' => 'success',
            'rekomendasi' => $hasilPeringkat
        ]);
    }
}