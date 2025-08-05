<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

// Route::get('/', function () {
//     return view('produk.index');
// });

Route::get('/produk', [ProdukController::class, 'index'])->name('index.index');
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('index.edit');
route::post('/produk/create', [ProdukController::class, 'create'])->name('index.create');
