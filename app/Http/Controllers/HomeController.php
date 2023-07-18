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
        // $krisan = 'RI001';
        $xmlString = file_get_contents('http://192.168.10.5:9173/api-dietgizi/api/listAll');
        // $xmlObject = simplexml_load_string($xmlString);
        $collection = json_decode($xmlString, true);
        // dd($collection);
        return view('pages.index', ['collection' => $collection]);
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
 
  
    public function printPriview()
    {
        // $getvalue = getDiet::all(); 
        return view('pages.dashboard.printPriview');
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
