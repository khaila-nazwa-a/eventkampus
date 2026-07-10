@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Data Anggaran</h3>
    <a href="{{ route('anggaran.create') }}" class="btn btn-primary">Tambah Data</a>
</div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Event</th>
                <th>Kategori</th>
                <th>Tipe</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
    <tbody>
    @foreach($anggarans as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->event->judul }}</td>
            <td>{{ $item->kategori->nama }}</td>
            <td>{{ $item->type }}</td>
            <td>Rp {{ number_format($item->jumlah,0,',','.') }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>
                <a href="{{ route('anggaran.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('anggaran.destroy',$item->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                    <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm"> Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
</table>
@endsection