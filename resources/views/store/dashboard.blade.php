<!-- resources/views/store/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard Toko</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <h2>Informasi Toko:</h2>
        @if($store)
            <p>Nama Toko: {{ $store->name }}</p>
            <p>Kategori: {{ $store->category }}</p>
            <p>Deskripsi: {{ $store->description }}</p>
            <p>NPWP: {{ $store->npwp }}</p>

            <!-- Menampilkan informasi alamat -->
            @if($addressData)
                <h2>Informasi Alamat:</h2>
                <p>Provinsi: {{ $addressData->indonesia_province->name }}</p>
                <p>Kabupaten: {{ $addressData->indonesia_city->name }}</p>
                <p>Kecamatan: {{ $addressData->district->name }}</p>
            @else
                <p>Alamat belum lengkap. <a href="{{ route('location.form') }}">Lengkapi Alamat</a></p>
            @endif

            <!-- Tombol untuk menambah barang -->
            <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>

            <!-- Tombol untuk melihat semua barang -->
            <a href="{{ route('barang.index') }}" class="btn btn-info">Lihat Semua Barang</a>

            <!-- Tombol untuk menuju ke formulir lokasi -->
            <a href="{{ route('location.form') }}" class="btn btn-success">Lengkapi Alamat</a>
        @else
            <p>Anda belum membuka toko. Silakan buka toko terlebih dahulu.</p>
        @endif
    </div>
@endsection
