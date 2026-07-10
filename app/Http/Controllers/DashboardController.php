<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Pendaftaran;
use App\Models\Kehadiran;
use App\Models\Anggaran;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
{
    if(auth()->user()->role == 'panitia')
    {
        $totalEvent = Event::count();
        $totalPeserta = User::where('role','peserta')->count();
        $totalPendaftaran = Pendaftaran::count();
        $totalKehadiran = Kehadiran::count();
        $totalPemasukan = Anggaran::where(
            'type',
            'Pemasukan'
        )->sum('jumlah');

        $totalPengeluaran = Anggaran::where(
            'type',
            'Pengeluaran'
        )->sum('jumlah');

        return view('dashboard.panitia', compact(
            'totalEvent',
            'totalPeserta',
            'totalPendaftaran',
            'totalKehadiran',
            'totalPemasukan',
            'totalPengeluaran'
        ));
    }

    return view('dashboard.peserta');
}
}