<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;
use Illuminate\Support\Facades\DB;

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
        $submitAction = $request->input('simpan_produk'); //baca attribut "name" dari btn
        // melakukan validasi data
        $request->validate([
            'nama' => 'required|max:45',
            'jenis' => 'required|max:45',
            'harga_jual' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'deskripsi' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],
        [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 45 karakter',
            'jenis.required' => 'jenis wajib diisi',
            'jenis.max' => 'jenis maksimal 45 karakter',
            'foto.max' => 'Foto maksimal 2 MB',
            'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'foto.image' => 'File harus berbentuk image'
        ]);
        
        //jika file foto ada yang terupload
        if(!empty($request->foto)){
            //maka proses berikut yang dijalankan
            $fileName = 'foto-'.uniqid().'.'.$request->foto->extension();
            //setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto->move(public_path('images'), $fileName);
        } else {
            $fileName = 'nophoto.jpeg';
        }
        
        //tambah data produk
        if ($submitAction === 'simpan') { // jika tombol dengan attribut 'value' ditekan
            DB::table('produk_models')->insert([
                'nama_produk'=>$request->nama,
                'jenis'=>$request->jenis,
                'harga_jual'=>$request->harga_jual,
                'harga_beli'=>$request->harga_beli,
                'deskripsi_produk' => $request->deskripsi,
                'foto'=>$fileName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            return redirect()->route('index.index');
        }
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
        $produk = ProdukModel::findOrFail($id); // atau sesuai modelmu
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $submitAction = $request->input('edit_produk'); //baca attribut "name" dari btn

        $request->validate([
            'nama' => 'required|max:45',
            'jenis' => 'required|max:45',
            'harga_jual' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'deskripsi' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],
        [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 45 karakter',
            'jenis.required' => 'jenis wajib diisi',
            'jenis.max' => 'jenis maksimal 45 karakter',
            'foto.max' => 'Foto maksimal 2 MB',
            'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'foto.image' => 'File harus berbentuk image'
        ]);

        //untuk get foto lama
        $fotoLama = DB::table('produk_models')->select('foto')->where('id',$id)->get();
        foreach($fotoLama as $f1){
            $fotoLama = $f1->foto;
        }

        //jika foto sudah ada yang terupload
        if(!empty($request->foto)){
            //maka proses selanjutnya
            if(!empty($fotoLama->foto)) unlink(public_path('images'.$fotoLama->foto));
            //proses ganti foto
            $fileName = 'foto-'.$request->id.'.'.$request->foto->extension();
            //setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto->move(public_path('images'), $fileName);
        } else{
            $fileName = $fotoLama;
        }

        if ($submitAction === 'Edit') {
            DB::table('produk_models')->where('id', $id)->update([
                'nama_produk' => $request->nama,
                'jenis' => $request->jenis,
                'harga_jual' => $request->harga_jual,
                'harga_beli' => $request->harga_beli,
                'deskripsi_produk' => $request->deskripsi,
                'foto' => $fileName,
                'updated_at' => now(),
            ]);
            
            return redirect()->route('index.index');
        }
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
