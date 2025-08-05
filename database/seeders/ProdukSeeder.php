<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try{
            DB::table('produk_models')->insert([
            [
                'nama_produk' => 'Produk A',
                'deskripsi_produk' => 'Deskripsi Produk A',
                'jenis' => 'Jenis A',
                'harga_jual' => 10000,
                'harga_beli' => 8000,
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Produk B',
                'deskripsi_produk' => 'Deskripsi Produk B',
                'jenis' => 'Jenis B',
                'harga_jual' => 20000,
                'harga_beli' => 15000,
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        } catch (\Exception $e) {
            // Handle the exception if needed
            echo "Error seeding Produk: " . $e->getMessage();
        }
    }
}
