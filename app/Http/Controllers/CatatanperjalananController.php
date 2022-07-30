<?php

namespace App\Http\Controllers;

use App\Models\Catatanperjalanan;
use Illuminate\Http\Request;

class CatatanperjalananController extends Controller
{
    public function index()
    {
        $catatanperjalanan = Catatanperjalanan::all();
        return view('catatanperjalanan', compact('catatanperjalanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Catatanperjalanan::create($request->all());
        return Redirect('/catatanperjalanan')->with('success','Data Berhasil Ditambahkan');
    }

}
