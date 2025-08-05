<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

// Route::get('/', function () {
//     return view('produk.index');
// });

Route::get('/produk', [ProdukController::class, 'produk'])->name('produk.index');
