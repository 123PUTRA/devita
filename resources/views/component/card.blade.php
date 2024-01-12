<!-- resources/views/component/card.blade.php -->
{{-- @extends('layouts.navbar') --}}



    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="Image">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('store.detail', ['storeId' => $store->id]) }}">{{ $store->name }}</a>
            </h5>
            <p class="card-text">{{ $barang->deskripsi }}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Nama Barang: {{ $barang->nama_barang }}</li>
            <li class="list-group-item">Harga: {{ $barang->harga }}</li>
            <!-- Tambahkan item-item lain yang ingin Anda tampilkan -->
        </ul>
        <div class="card-body">
            <a href="#" class="btn btn-success">Add to Cart</a>
            <a href="#" class="btn btn-warning">Beli</a>
        </div>
    </div>

