<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'kategori_id',
        'user_id',
        'judul',
        'deskripsi',
        'poster',
        'lokasi',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'kuota'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function anggarans()
    {
        return $this->hasMany(Anggaran::class);
    }
}