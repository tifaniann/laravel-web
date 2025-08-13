<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pengguna extends Model
{
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
