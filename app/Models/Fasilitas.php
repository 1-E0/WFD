<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'fasilitas';

    protected $fillable = [
        'nama_fasilitas',
        'stok_tersedia',
    ];

    public function peminjaman()
    {
        return $this->belongsToMany(Peminjaman::class, 'peminjaman_fasilitas', 'fasilitas_id', 'peminjaman_id')
                    ->withPivot('jumlah_dipinjam')
                    ->withTimestamps();
    }
}