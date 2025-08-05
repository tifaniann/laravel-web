<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory; //untuk membuat data dummy/ database seeding
    protected $fillable = [ //kolom yang bisa diisi di form
        'nama_produk',
        'deskripsi_produk',
        'jenis',
        'harga_jual',
        'harga_beli',
        'foto'
    ];
}
