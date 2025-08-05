<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;

class ProdukController extends Controller
{
    public function produk(){
        // return view('produk.index');
        $produkList = ProdukModel::all();
        return view('produk.index', compact('produkList'));
    }

    public function edit($id)
    {
        $produk = ProdukModel::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

}
