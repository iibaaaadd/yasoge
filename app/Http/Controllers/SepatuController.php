<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sepatu;

class SepatuController extends Controller
{
    public function index()
    {
        $sepatu = Sepatu::all(); // Misalnya, mengambil semua data sepatu dari model

        return view('sepatu.index', [
            'sepatu' => $sepatu,
        ]);
    }

    public function create()
    {
        return view('sepatu.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Penanganan unggahan foto
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->extension(); // Atur nama file unik
            $image->move(public_path('foto'), $imageName); // Pindahkan file ke direktori yang ditentukan
            $validatedData['gambar'] = $imageName; // Simpan nama file ke dalam data yang akan disimpan
        }

        Sepatu::create($validatedData);

        return redirect()->route('sepatu.index')->with('success', 'Sepatu berhasil ditambahkan.');
    }
}
