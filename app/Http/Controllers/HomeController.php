<?php

namespace App\Http\Controllers;

use App\Models\diet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\getDiet;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $source = file_get_contents('http://192.168.10.5:9173/api-dietgizi/api/listAll');
        $collection = json_decode($source, true);
        $getval = getDiet::all();
        // dd($collection);
        return view('pages.index', ['collection' => $collection, 'getval' => $getval]);
        // return view('pages.index', ['collection' => $collection]);
    }

    public function krisan()
    {
        $source = file_get_contents('http://192.168.10.5:9173/api-dietgizi/api/listAll');
        $collection = json_decode($source, true);
        $getval = getDiet::all();
        // dd($collection);
        return view('pages.krisan', ['collection' => $collection, 'getval' => $getval]);
        // return view('pages.index', ['collection' => $collection]);
    }

    public function matahari()
    {
        $source = file_get_contents('http://192.168.10.5:9173/api-dietgizi/api/listAll');
        $collection = json_decode($source, true);
        $getval = getDiet::all();
        // dd($collection);
        return view('pages.matahari', ['collection' => $collection, 'getval' => $getval]);
        // return view('pages.index', ['collection' => $collection]);
    }


    public function tulip()
    {
        $source = file_get_contents('http://192.168.10.5:9173/api-dietgizi/api/listAll');
        $collection = json_decode($source, true);
        $getval = getDiet::all();
        // dd($collection);
        return view('pages.tulip', ['collection' => $collection, 'getval' => $getval]);
        // return view('pages.index', ['collection' => $collection]);
    }

    public function lili()
    {
        $source = file_get_contents('http://192.168.10.5:9173/api-dietgizi/api/listAll');
        $collection = json_decode($source, true);
        $getval = getDiet::all();
        // dd($collection);
        return view('pages.lili', ['collection' => $collection, 'getval' => $getval]);
        // return view('pages.index', ['collection' => $collection]);
    }

    public function isolasi()
    {
        $source = file_get_contents('http://192.168.10.5:9173/api-dietgizi/api/listAll');
        $collection = json_decode($source, true);
        $getval = getDiet::all();
        // dd($collection);
        return view('pages.isolasi', ['collection' => $collection, 'getval' => $getval]);
        // return view('pages.index', ['collection' => $collection]);
    }


    public function dash()
    {
        $getval = getDiet::all();
        return view('pages.dashboard.index', ['getval' => $getval]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getLabel()
    {
        // $getvalue = getDiet::all(); 
        // // dd($getValue);
        // return view('pages.index', ['getvalues' => $getvalue]);
    }


    public function cetakPagi($id)
    {
        // $getval = getDiet::find('id', $id)->get();
        $getval = DB::table('diet-gizi')->where('id', $id)->get();
        return view('pages.dashboard.cetakPagi', ['val' => $getval]);
    }

    public function cetakSiang($id)
    {
        // $getval = getDiet::find('id', $id)->get();
        $getval = DB::table('diet-gizi')->where('id', $id)->get();
        return view('pages.dashboard.cetakSiang', ['val' => $getval]);
    }

    public function cetakSore($id)
    {
        // $getval = getDiet::find('id', $id)->get();
        $getval = DB::table('diet-gizi')->where('id', $id)->get();
        return view('pages.dashboard.cetakSore', ['val' => $getval]);
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
