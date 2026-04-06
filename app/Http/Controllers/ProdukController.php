<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\produk;

class ProdukController extends Controller
{
    public function index(){
        $dataToko = [
         'nama_toko'=>'toko elektronik',
            'alamat'=>'Surabaya, jawa timur',
           'type'=>'Ruko'
        
        ];
        $data = produk::all();
        return view('pages.produk.show',compact('data','dataToko'));
    }

    public function create(){
        return view('pages.produk.add');
    }
public function store(Request $request)
{

    $request->validate([
        'nama_produk' => 'required',
        'harga' => 'required|numeric',
        'deskripsi_produk' => 'required',
    ]);

    
    Produk::create([
        'nama_produk' => $request->nama_produk,
        'harga' => $request->harga,
        'deskripsi_produk' => $request->deskripsi_produk,
        'kategori_id' => 1, 
    ]);

    
    return redirect()->route('produk.index')->with('success', 'Data berhasil ditambah!');
}
public function edit($id)
{
    $produk = Produk::findOrFail($id); // Cari data, jika tidak ada muncul 404
    return view('pages.produk.edit', compact('produk'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_produk' => 'required',
        'harga' => 'required|numeric',
        'deskripsi_produk' => 'required',
    ]);

    $produk = Produk::findOrFail($id);
    $produk->update([
        'nama_produk' => $request->nama_produk,
        'harga' => $request->harga,
        'deskripsi_produk' => $request->deskripsi_produk,
    ]);

    return redirect()->route('produk.index')->with('message', 'Data berhasil diubah!');
}

public function destroy($id)
{
   
    $produk = \App\Models\Produk::findOrFail($id);

   
    $produk->delete();

   
    return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
}

}