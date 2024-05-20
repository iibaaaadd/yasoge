<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
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

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $sepatu = Sepatu::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->extension(); // Generate a unique file name
            $image->move(public_path('foto'), $imageName); // Move the file to the specified directory
            $validatedData['gambar'] = $imageName; // Save the file name to the data to be saved
        } else {
            $validatedData['gambar'] = $sepatu->gambar;
        }

        $sepatu->update($validatedData);

        // Fetch the updated timestamp
        $updatedAt = $sepatu->updated_at->format('d-m-Y H:i:s');

        return redirect()->route('sepatu.index')->with('success', 'Sepatu berhasil diperbarui. Diperbarui pada: ' . $updatedAt);
    }

    public function destroy($id)
    {
        $sepatu = Sepatu::findOrFail($id);
        unlink(public_path('foto/' . $sepatu->gambar)); // Hapus file gambar dari direktori
        $sepatu->delete();

        return redirect()->route('sepatu.index')->with('success', 'Sepatu berhasil dihapus.');
    }

    public function download($id)
    {
        $sepatu = Sepatu::findOrFail($id);
        $filePath = public_path('foto/' . $sepatu->gambar);

        if (file_exists($filePath)) {
            $fileName = $sepatu->kode . '.' . pathinfo($filePath, PATHINFO_EXTENSION);
            return Response::download($filePath, $fileName);
        } else {
            return redirect()->route('sepatu.index')->with('error', 'File tidak ditemukan.');
        }
    }
}
