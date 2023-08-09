<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\diet;
use App\Models\updateDiet;
use App\Models\isPulang;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\Events\Validated;
use Symfony\Component\HttpFoundation\RedirectResponse;


class ProsesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addDiet(Request $request)
    {

        $request->validate([
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
        // dd($request);
        $data = diet::create($request->all());

        if ($data->save()) {
            toast('Berhasil Tersimpan', 'success')->autoClose(5000);
            return back();
        } else {
            toast('Gagal Tersimpan!', 'error')->autoClose(5000);
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        diet::whereId($id)->first();
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // $PasienID = updateDiet::find($PasienID);
        $request->validate([
            'diet_pagi' => 'required',
            'diet_pagi_konsistensi' => 'required',
            'diet_siang' => 'required',
            'diet_siang_konsistensi' => 'required',
            'diet_sore' => 'required',
            'diet_sore_konsistensi' => 'required',
        ]);
        // dd($request);

        $data2 = updateDiet::where('pasienID', $request->PasienID)
            ->update([
                'diet_pagi' => $request->diet_pagi,
                'diet_pagi_konsistensi' => $request->diet_pagi_konsistensi,
                'diet_siang' => $request->diet_siang,
                'diet_siang_konsistensi' => $request->diet_siang_konsistensi,
                'diet_sore' => $request->diet_sore,
                'diet_sore_konsistensi' => $request->diet_sore_konsistensi,
            ]);

        if ($data2) {
            toast('Data Berhasil Terupdate', 'success')->autoClose(6000);
            return back();
        } else {
            toast('Gagal!', 'error')->autoClose(7000);
            return back();
        }
    }


    public function pulang(Request $request, $PasienID)
    {
        // dd($request);
        $data3 = isPulang::where('pasienID', $PasienID)
            ->update([
                'isPulang' => $request->isPulang
            ]);

        if ($data3) {
            toast('Berhasil! Pasien Bali Muleh', 'success')->autoClose(5000);
            return back();
        } else {
            toast('Gagal Tersimpan!', 'error')->autoClose(5000);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
