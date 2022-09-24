<?php

namespace App\Http\Controllers;

use App\Models\Catatanperjalanan;
use Illuminate\Http\Request;

class CatatanperjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $catatanperjalanan = Catatanperjalanan::paginate(5);
        return view('catatanperjalanan',compact('catatanperjalanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catatanperjalanancreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'lokasi' => 'required',
            'suhutubuh' => 'required|min:3'
        ]);

        Catatanperjalanan::create($request->all());
        return Redirect('/catatanperjalanan')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catatanperjalanan = Catatanperjalanan::findorfail($id);
        return view('catatanperjalananupdate', compact('catatanperjalanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'lokasi' => 'required',
            'suhutubuh' => 'required|min:3'
        ]);

         $guru = Catatanperjalanan::findorfail($id);
         $guru->update($request->all());
         return redirect('/catatanperjalanan')->with('success', 'Datacatatanperjalanan Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catatanperjalanan = Catatanperjalanan::findorfail($id);
        $catatanperjalanan->delete();
        return redirect('/catatanperjalanan')->with('destroy','Datacatatanperjalanan Berhasil DiHapus');
    }
}
