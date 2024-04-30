<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Http\Requests\UpdatePegawaiRequest; // Tambahkan ini
use Illuminate\Http\Request;


class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.view', ['pegawai' => $pegawai]);
    }

    public function create()
    {
        // Panggil method getIdPegawai() pada instance Pegawai
        return view('pegawai.create', ['id_pegawai' => (new Pegawai())->getIdPegawai()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pegawai' => 'required',
            'nama_pegawai' => 'required|unique:pegawai|min:5|max:255',
            'alamat_pegawai' => 'required',
            'no_telpon_pegawai' => 'required',
        ]);

        Pegawai::create($request->all());
        
        return redirect()->route('pegawai.index')->with('success','Data Berhasil di Input');
    }

    public function show(Pegawai $pegawai)
    {
        //
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai)
    {
        $validated = $request->validate([
            'id_pegawai' => 'required',
            'nama_pegawai' => 'required|min:5|max:255',
            'alamat_pegawai' => 'required',
            'no_telpon_pegawai' => 'required',
        ]);
    
        $pegawai->update($validated);
    
        return redirect()->route('pegawai.index')->with('success','Data Berhasil di Ubah');
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success','Data Berhasil di Hapus');
    }
}
