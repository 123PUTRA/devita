<?php
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/location-form', [AlamatController::class, 'showLocationForm'])->name('location.form');
Route::post('/save-selected-location', [AlamatController::class, 'saveSelectedLocation'])->name('save.selected.location');
Route::get('/show-selected-location', [AlamatController::class, 'showSelectedLocation'])->name('show.selected.location');

// routes/web.php
// ...
Route::post('/get-kabupaten', [AlamatController::class, 'getKabupatenByProvinsi'])->name('get-kabupaten');
Route::get('/get-kecamatan/{kabupatenCode}', [AlamatController::class, 'getKecamatanByKabupaten'])->name('get-kecamatan');




Route::middleware('web')->group(function () {
    // Rute login dan logout

    Route::get('/store/detail/{storeId}', [StoreController::class, 'detail'])->name('store.detail');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        // Rute registrasi
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);


    // Pastikan bahwa route berikut ditempatkan di dalam grup middleware 'auth'
    Route::middleware(['auth'])->group(function () {
        // Rute-rute yang memerlukan otentikasi

        Route::prefix('store')->group(function () {
            // Rute-rute toko
            Route::get('/dashboard', [StoreController::class, 'dashboard'])->name('store.dashboard');
            Route::get('/open_store_form', [StoreController::class, 'openStoreForm'])->name('store.open_store_form');
            Route::post('/open_store_submit', [StoreController::class, 'openStore'])->name('store.open_store_submit');
            Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
            Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
            Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
            Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
            Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
            Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');


      
        });
    });
});