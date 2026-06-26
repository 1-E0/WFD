<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id',
        'ruangan_id',
        'tanggal_pinjam',
        'jam_mulai',
        'jam_selesai',
        'status',
        'dokumen_surat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }

    public function fasilitas()
    {
        return $this->belongsToMany(Fasilitas::class, 'peminjaman_fasilitas', 'peminjaman_id', 'fasilitas_id')
                    ->withPivot('jumlah_dipinjam')
                    ->withTimestamps();
    }
}