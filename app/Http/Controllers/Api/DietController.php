<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\diet;
use App\Models\updateDiet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DietController extends Controller
{
    // public function addDiet(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'regID' => 'required',
    //         'bed' => 'required',
    //         'nama' => 'required',
    //         'pasienID' => 'required',
    //         'DPJP' => 'required',
    //         'diet_pagi' => 'required',
    //         'diet_pagi_konsistensi' => 'required',
    //         'diet_siang' => 'required',
    //         'diet_siang_konsistensi' => 'required',
    //         'diet_sore' => 'required',
    //         'diet_sore_konsistensi' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Validasi gagal',
    //             'errors' => $validator->errors(),
    //         ], 422);
    //     }

    //     $data = diet::create($request->all());

    //     if ($data) {
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Berhasil Tersimpan',
    //             'data' => $data,
    //         ], 201);
    //     }

    //     return response()->json([
    //         'success' => false,
    //         'message' => 'Gagal Tersimpan',
    //     ], 500);
    // }

    public function addDiet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'regID' => 'required|string',
            'bed' => 'required|string',
            'nama' => 'required|string',
            'pasienID' => 'required|string',
            'DPJP' => 'nullable|string',
            'diet_pagi' => 'nullable|string',
            'diet_pagi_konsistensi' => 'nullable|string',
            'diet_siang' => 'nullable|string',
            'diet_siang_konsistensi' => 'nullable|string',
            'diet_sore' => 'nullable|string',
            'diet_sore_konsistensi' => 'nullable|string',
            'isPulang' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors(),
                ],
                422,
            );
        }

        try {
            // Parameter pertama array (Kunci): Kolom apa yang dicari di DB, dan apa nilainya.
            // Parameter kedua array (Data): Kolom-kolom lain yang mau dimasukkan/diperbarui.
            $diet = Diet::updateOrCreate(
                [
                    'regID' => $request->regID, // Mencari berdasarkan nama kolom 'regID' dengan isi $request->regID
                ],
                [
                    'bed' => $request->bed,
                    'nama' => $request->nama,
                    'pasienID' => $request->pasienID,
                    'DPJP' => $request->DPJP,
                    'diet_pagi' => $request->diet_pagi,
                    'diet_pagi_konsistensi' => $request->diet_pagi_konsistensi,
                    'diet_siang' => $request->diet_siang,
                    'diet_siang_konsistensi' => $request->diet_siang_konsistensi,
                    'diet_sore' => $request->diet_sore,
                    'diet_sore_konsistensi' => $request->diet_sore_konsistensi,
                    'isPulang' => $request->isPulang ?? 0,
                ],
            );

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data diet berhasil diproses!',
                    'data' => $diet,
                ],
                200,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Gagal menyimpan data ke database',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
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
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors(),
                ],
                422,
            );
        }

        $updated = Diet::where('pasienID', $request->pasienID)->update([
            'diet_pagi' => $request->diet_pagi,
            'diet_pagi_konsistensi' => $request->diet_pagi_konsistensi,
            'diet_siang' => $request->diet_siang,
            'diet_siang_konsistensi' => $request->diet_siang_konsistensi,
            'diet_sore' => $request->diet_sore,
            'diet_sore_konsistensi' => $request->diet_sore_konsistensi,
        ]);

        if ($updated) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data Berhasil Terupdate',
                ],
                200,
            );
        }

        return response()->json(
            [
                'success' => false,
                'message' => 'Gagal update, data tidak ditemukan atau tidak ada perubahan',
            ],
            404,
        );
    }

    public function getDietByReg($regID)
    {
        try {
            // Mencari spesifik hanya untuk kunjungan (regID) ini saja
            $diet = Diet::where('regID', $regID)->first();

            if (!$diet) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Data diet belum diisi untuk nomor registrasi ini.',
                    ],
                    404,
                );
            }

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data diet ditemukan.',
                    'data' => $diet,
                ],
                200,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Gagal mengambil data dari database.',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
    }
}
