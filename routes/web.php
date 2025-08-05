<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

// Route::get('/', function () {
//     return view('produk.index');
// });

Route::get('/produk', [ProdukController::class, 'produk'])->name('produk.index');
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
