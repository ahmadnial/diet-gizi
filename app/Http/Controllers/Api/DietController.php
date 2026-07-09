<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\diet;
use App\Models\updateDiet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DietController extends Controller
{
    public function addDiet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bed' => 'required',
            'nama' => 'required',
            'pasienID' => 'required',
            'DPJP' => 'required',
            'diet_pagi' => 'required',
            'diet_pagi_konsistensi' => 'required',
            'diet_siang' => 'required',
            'diet_siang_konsistensi' => 'required',
            'diet_sore' => 'required',
            'diet_sore_konsistensi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = diet::create($request->all());

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Tersimpan',
                'data' => $data,
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal Tersimpan',
        ], 500);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pasienID' => 'required',
            'diet_pagi' => 'required',
            'diet_pagi_konsistensi' => 'required',
            'diet_siang' => 'required',
            'diet_siang_konsistensi' => 'required',
            'diet_sore' => 'required',
            'diet_sore_konsistensi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422);
        }

        $updated = updateDiet::where('pasienID', $request->pasienID)
            ->update([
                'diet_pagi' => $request->diet_pagi,
                'diet_pagi_konsistensi' => $request->diet_pagi_konsistensi,
                'diet_siang' => $request->diet_siang,
                'diet_siang_konsistensi' => $request->diet_siang_konsistensi,
                'diet_sore' => $request->diet_sore,
                'diet_sore_konsistensi' => $request->diet_sore_konsistensi,
            ]);

        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Terupdate',
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal update, data tidak ditemukan atau tidak ada perubahan',
        ], 404);
    }
}