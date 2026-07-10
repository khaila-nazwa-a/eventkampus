<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    protected $fillable = [
        'event_id',
        'kategori_id',
        'type',
        'jumlah',
        'deskripsi',
        'tanggal'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}