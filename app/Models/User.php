<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Kode model lainnya...
}
