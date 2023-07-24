<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $data = Data::where(function ($query) use ($keyword) {
            $query->where('nomor', 'LIKE', "%$keyword%")
                ->orWhere('nama', 'LIKE', "%$keyword%")
                ->orWhere('nik', 'LIKE', "%$keyword%")
                ->orWhere('jeniskelamin', 'LIKE', "%$keyword%")
                ->orWhere('tanggal_lahir', 'LIKE', "%$keyword%")
                ->orWhere('alamat', 'LIKE', "%$keyword%");
        })->get();
    
        $title = 'Data'; // Menetapkan nilai judul
    
        return view('data', compact('data', 'title'));
    }
    
    public function tambah(Request $request)
    {
        $request->validate([
            'nomor'=> 'required',
            'nama' => 'required',
            'nik' => 'required',
            'jeniskelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480', // Validasi untuk gambar
        ]);

        $data = new Data;
        $data->nomor = $request->nomor;
        $data->nama = $request->nama;
        $data->nik = $request->nik;
        $data->jeniskelamin = $request->jeniskelamin;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->alamat = $request->alamat;

        // Cek apakah ada gambar yang diunggah
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads'), $nama_foto);
            $data->foto = $nama_foto;
        }

        $data->save();

        return redirect()->route('data.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, Data $data)
    {
        $request->validate([
            'nomor'=> 'required',
            'nama' => 'required',
            'nik' => 'required',
            'jeniskelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480', // Validasi untuk gambar
        ]);

        $data->nomor = $request->nomor;
        $data->nama = $request->nama;
        $data->nik = $request->nik;
        $data->jeniskelamin = $request->jeniskelamin;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->alamat = $request->alamat;

        // Cek apakah ada gambar yang diunggah
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads'), $nama_foto);
            $data->foto = $nama_foto;
        }

        $data->save();

        return redirect()->route('data.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function hapus(Data $data)
    {
        $data->delete();

        return redirect()->route('data.index')->with('success', 'Data berhasil dihapus.');
    }
}
