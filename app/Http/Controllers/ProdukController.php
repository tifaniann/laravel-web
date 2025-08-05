<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;

class ProdukController extends Controller
{
    // public function produk(){
    //     // return view('produk.index');
    //     $produkList = ProdukModel::all();
    //     return view('produk.index', compact('produkList'));
    // }

    // public function edit($id)
    // {
    //     $produk = ProdukModel::findOrFail($id);
    //     return view('produk.edit', compact('produk'));
    // }

    public function index()
    {
        $produkList = ProdukModel::all();
        return view('produk.index', compact('produkList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $produkList = ProdukModel::all();
        // return view('index.index', compact('produkList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
