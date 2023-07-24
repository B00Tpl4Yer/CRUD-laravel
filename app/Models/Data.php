<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = ['nomor','nama', 'nik','jeniskelamin', 'tanggal_lahir', 'alamat', 'foto'];

    // Definisikan accessor untuk mengambil URL foto jika ada
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('uploads/' . $this->foto);
        }
        return null;
    }
}
