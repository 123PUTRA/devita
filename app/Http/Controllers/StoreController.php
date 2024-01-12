<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    // Menampilkan halaman dashboard toko
    public function dashboard()
    {
        // Memastikan bahwa pengguna sudah login
    if (Auth::check()) {
        // Mendapatkan data toko berdasarkan pengguna yang sedang login
        $store = Store::where('user_id', auth()->id())->first();

        // Jika toko ditemukan, tampilkan dashboard
        if ($store) {
            // Ambil data alamat dari tabel addresses (bukan provinces)
            $addressData = Address::where('store_id', $store->id)->first();

            return view('store.dashboard', compact('store', 'addressData'));
        }
    }
        // Jika toko tidak ditemukan, redirect ke halaman home atau halaman buka toko
        return redirect('/')->with('error', 'Anda belum membuka toko. Silakan buka toko terlebih dahulu.');
    }

    // Menampilkan form untuk membuka toko
    public function openStoreForm()
    {
        return view('store.open_store_form');
    }

    // Menyimpan informasi toko yang dibuka oleh pengguna
    public function openStore(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'npwp' => 'required|string|digits:15|unique:stores',
        ]);

        // Membuat toko baru
        Store::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'npwp' => $request->npwp,
        ]);

          // Redirect ke halaman dashboard toko
        return redirect()->route('store.dashboard')->with('success', 'Toko berhasil dibuka!');

    }

  // StoreController.php
    public function detail($storeId)
    {
        $store = Store::with('barangs')->findOrFail($storeId);
        $barangs = $store->barangs;

        return view('store.detail', compact('store', 'barangs'));
    }

}