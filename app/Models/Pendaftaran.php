<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'qr_code',
        'tanggal_daftar',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function kehadiran()
    {
        return $this->hasOne(Kehadiran::class);
    }
}