@extends('layouts.app')
@section('content')
<h3>Riwayat Pendaftaran</h3>
<hr>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Event</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>QR Code</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pendaftaran as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->event->judul }}</td>
            <td>{{ $item->tanggal_daftar }}</td>
            <td>{{ $item->status }}</td>
            <td>
                <img src="{{ asset('storage/'.$item->qr_code) }}" width="120">
                <br><br>
                <a href="{{ asset('storage/'.$item->qr_code) }}" download class="btn btn-success btn-sm">Download</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">
                Belum ada data pendaftaran
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection