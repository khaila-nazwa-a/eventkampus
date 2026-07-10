<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function detail(Event $event)
    {
        return view('pendaftaran.detail', compact('event'));
    }

    public function daftar(Event $event)
    {
        if (Pendaftaran::where('user_id', auth()->id())->where('event_id', $event->id)->exists()) {
            return back()->with('error', 'Anda sudah terdaftar.');
        }

        if ($event->sisa_kuota <= 0) {
            return back()->with('error', 'Kuota sudah penuh.');
        }

        $kode = Str::uuid();

        $namaFile = $kode . '.svg';
        Storage::disk('public')->put(
            'qrcode/' . $namaFile,
            QrCode::format('svg')->size(300)->generate($kode)
        );

        Pendaftaran::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'qr_code' => 'qrcode/' . $namaFile,
            'tanggal_daftar' => now(),
            'status' => 'Terdaftar'
        ]);

        $event->decrement('sisa_kuota');
        return redirect()->route('pendaftaran.index')
                ->with('success', 'Pendaftaran berhasil.');
    }

    public function index()
    {
        $pendaftaran = Pendaftaran::with('event')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('pendaftaran.index', compact('pendaftaran'));
    }
}