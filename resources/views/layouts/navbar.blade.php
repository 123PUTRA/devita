<!-- resources/views/navbar.blade.php -->
@extends('layouts.app')

<nav class="navbar navbar-expand-lg bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        @auth
          @if(auth()->user()->store)
              <!-- Jika pengguna telah membuka toko, tampilkan tombol untuk menuju halaman dashboard -->
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('store.dashboard') }}">Dashboard</a>
              </li>
          @else
              <!-- Jika pengguna belum membuka toko, tampilkan tombol untuk membuka toko -->
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('store.open_store_form') }}">Buka Toko</a>
              </li>
          @endif
        @else
          <!-- Jika pengguna tidak login, tampilkan tombol untuk membuka toko -->
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Buka Toko</a>
          </li>
        @endauth

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      <!-- Check if user is authenticated -->
      @auth
        <!-- If authenticated, show logout button -->
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="btn btn-outline-primary" type="submit">Logout</button>
        </form>
      @else
        <!-- If not authenticated, show login button -->
        <a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
      @endauth
    </div>
  </div>
</nav>

