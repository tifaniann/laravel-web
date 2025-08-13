<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try{
            DB::table('penggunas')->insert([
            [
                'username' => 'tifani',
                'email' => 'tifani@gmail.com',
                'password' => Hash::make('password123'), // hash password
                'remember_token' => Str::random(10),     // token acak
                'email_verified_at' => now(),            
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'tifani123',
                'email' => 'tifani123@gmail.com',
                'password' => 'admin123',
                'remember_token' => Str::random(10),     // token acak
                'email_verified_at' => now(),            
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        }
        catch (\Exception $e) {
            // Handle the exception if needed
            echo "Error seeding Pengguna: " . $e->getMessage();
        }
    }
}
