<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

// Route::get('/', function () {
//     return view('produk.index');
// });

Route::get('/produk', [ProdukController::class, 'index'])->name('index.index');
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('index.edit');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('index.create');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('index.store'); //mengirim data ke database; insert
route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('index.edit');
route::put('/produk/{id}/update', [ProdukController::class, 'update'])->name('index.update');
Route::delete('/produk/{id}/destroy', [ProdukController::class, 'destroy'])->name('index.destroy');
