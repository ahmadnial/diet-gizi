<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\diet;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\Events\Validated;
use Symfony\Component\HttpFoundation\RedirectResponse;


class ProsesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addDiet(Request $request): RedirectResponse
    {

        $request->validate([
            'bed' => 'required',
            'nama' => 'required',
            'pasienID' => 'required',
            'DPJP' => 'required',
            'diet' => 'required',
        ]);

        $data = diet::create($request->all());

        if ($data->save()) {
            toast('Berhasil Tersimpan', 'success')->autoClose(5000);
            return back();
        } else {
            toast('Gagal Tersimpan!', 'error')->autoClose(5000);
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
