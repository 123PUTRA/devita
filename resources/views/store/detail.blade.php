<!-- resources/views/store/detail.blade.php -->

@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h1>Detail Toko</h1>

        <h2>Nama Toko: {{ $store->name }}</h2>
        <p>Category UMKM: {{ $store->category }}</p>
        <p>Deskripsi Toko: {{ $store->description }}</p>

        <h2>Barang-barang:</h2>
        @foreach($barangs as $barang)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                    <p class="card-text">Deskripsi: {{ $barang->deskripsi }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
