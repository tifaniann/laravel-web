<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    protected $table = 'penggunas'; 
    use HasFactory;
    protected $fillable = [
        'username',
        'password',
        'email',
    ];

    protected $hidden = [
        'password',
        'remember_token', // 'remember me'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
