<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //dd($request->all());
        $this->validate($request, [
            'penjual_id'           =>'required|min:0',
            'namaproduk'           =>'required|min:0',
            'harga'                =>'required|min:0',
        ]);

        //create post
        
        Produk::create([
            'penjual_id'    =>$request->penjual_id,
            'namaproduk'    =>$request->namaproduk,
            'harga'         =>$request->harga,  
        ]);
        
      
     
        return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(produk $produk)
    {
        return view('penjual.tambahproduk', compact('penjual'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(produk $produk)
    {
        return view('penjual.tambahproduk', compact('penjual'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penjual->delete();

        //redirect to index
        return redirect()->route('penjuals.tambahproduk')->with(['success' => 'Data Berhasil Dihapus!']);
    }

  
}
