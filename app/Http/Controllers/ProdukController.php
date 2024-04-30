<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //query data
        $produk = produk::all();
        return view('produk.view',
                    [
                        'produk' => $produk
                    ]
                  );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // berikan kode produk secara otomatis
        // 1. query dulu ke db, select max untuk mengetahui posisi terakhir 
        
        return view('produk/create',
                    [
                        'kode_produk' => produk::getKodeproduk()
                    ]
                  );
        // return view('pproduk/view');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru disimpan ke db
        $validated = $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required|unique:produk|min:5|max:255',
            'harga' => 'required',
            'jenis_produk' => 'required|unique:produk|min:5|max:255',
        ]);

        // masukkan ke db
        produk::create($request->all());
        
        return redirect()->route('produk.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produk $produk)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru diupdate ke db
        $validated = $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required|unique:produk|min:5|max:255',
            'harga' => 'required',
            'jenis_produk' => 'required|unique:produk|min:5|max:255',
        ]);
    
        $produk->update($validated);
    
        return redirect()->route('produk.index')->with('success','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy ($id)
    {
         //hapus dari database
        $produk = produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success','Data Berhasil di Hapus');
    }
}