@extends('layouts.app')
@section('content')
<h2>Dashboard Panitia</h2>
<hr>
<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5>Total Event</h5>
                <h2>{{ $totalEvent }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5>Total Peserta</h5>
                <h2>{{ $totalPeserta }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5>Total Pendaftaran</h5>
                <h2>{{ $totalPendaftaran }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5>Total Kehadiran</h5>
                <h2>{{ $totalKehadiran }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5>Total Pemasukan</h5>
                <h3>
                    Rp {{ number_format($totalPemasukan,0,',','.') }}
                </h3>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5>Total Pengeluaran</h5>
                <h3>
                    Rp {{ number_format($totalPengeluaran,0,',','.') }}
                </h3>
            </div>
        </div>
    </div>
</div>
@endsection