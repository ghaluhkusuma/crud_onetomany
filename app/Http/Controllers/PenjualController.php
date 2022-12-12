<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PenjualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //get posts
        $penjuals = Penjual::latest()->paginate(5);

        //render view with posts
        return view('penjual.index', compact('penjuals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penjual.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $this->validate($request, [
            'nama'           =>'required|min:0',
            'alamat'         =>'required|min:0',
        ]);

        //create post
        
        Penjual::create([
            'nama'    =>$request->nama,
            'alamat'  =>$request->alamat,  
        ]);
        
      
     
        return redirect()->route('penjual.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function show(Penjual $penjual)
    {
        return view('penjual.tambahproduk', compact('penjual'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjual $penjual)
    {
        return view('penjual.tambahproduk', compact('penjual'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjual $penjual)
    {
        //validate form
        dd($request->all());
        $this->validate($request, [
            
            'nama'          => 'required',
            'alamat'        => 'required',
            // 'namaproduk'    => 'required',
            // 'harga'         => 'required',

        ]);

        //create post
        $penjuals=Penjual::create([
            
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
            // 'namaproduk'    => $request->namaproduk,
            // 'harga'         => $request->harga,
        ]);

        //redirect to index
        return redirect()->route('penjuals.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjual $penjual)
    {
        $penjual->delete();

        //redirect to index
        return redirect()->route('penjual.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
