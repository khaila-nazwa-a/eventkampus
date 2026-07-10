<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehadiran;
use App\Models\Pendaftaran;

class KehadiranController extends Controller
{
    public function scan(Request $request)
{
    $pendaftaran = Pendaftaran::where('qr_code', 'like', '%' . $request->kode . '%')->first();

    if (!$pendaftaran) {
        return back()->with('error', 'QR Code tidak ditemukan.');
    }

    if (Kehadiran::where('pendaftaran_id', $pendaftaran->id)->exists()) {
        return back()->with('error', 'Peserta sudah melakukan check-in.');
    }

    Kehadiran::create([
        'pendaftaran_id' => $pendaftaran->id,
        'waktu_scan' => now(),
        'status' => 'Hadir'
    ]);

    $pendaftaran->update([
        'status' => 'Hadir'
    ]);

    return back()->with('success', 'Check-in berhasil.');
}
}
