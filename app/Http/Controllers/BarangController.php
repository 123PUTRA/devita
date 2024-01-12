<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Store;

class BarangController extends Controller
{
    // Menampilkan daftar barang
    public function index()
    {
        // Mendapatkan toko pengguna yang sedang login
        $store = Store::where('user_id', auth()->id())->first();

        // Mengecek apakah toko ditemukan
        if ($store) {
            $barangs = $store->barangs;
            return view('barang.index', compact('barangs'));
        }

        // Jika toko tidak ditemukan, redirect ke halaman home atau tampilkan pesan error
        return redirect('/')->with('error', 'Anda belum membuka toko. Silakan buka toko terlebih dahulu.');
    }

    // Menampilkan form untuk menambah barang
    public function create()
    {
        return view('barang.create');
    }

    // Menyimpan barang baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
        ]);

        // Mendapatkan toko pengguna yang sedang login
        $store = Store::where('user_id', auth()->id())->first();

        // Mengecek apakah toko ditemukan
        if ($store) {
            // Menyimpan barang dengan mengaitkannya ke toko
            $store->barangs()->create([
                'nama_barang' => $request->nama_barang,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
            ]);

            return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
        }

        // Jika toko tidak ditemukan, redirect ke halaman home atau tampilkan pesan error
        return redirect('/')->with('error', 'Anda belum membuka toko. Silakan buka toko terlebih dahulu.');
    }

    // Menampilkan form untuk mengedit barang
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    // Menyimpan perubahan barang ke database
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
        ]);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    // Menghapus barang dari database
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }



}