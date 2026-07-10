@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Data Event</h3>
    @if(auth()->user()->role == 'panitia')
    <a href="{{ route('event.create') }}" class="btn btn-primary">Tambah Event</a>
    @endif
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
            <th>Poster</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Tanggal</th>
            <th>Kuota</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><img src="{{ asset('storage/'.$event->poster) }}" width="100"></td>
            <td>{{ $event->judul }}</td>
            <td>{{ $event->kategori->nama }}</td>
            <td>{{ $event->tanggal }}</td>
            <td>{{ $event->kuota }}</td>
            @if(auth()->user()->role == 'panitia')
                <td><a href="{{ route('event.edit',$event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('event.destroy',$event->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus event?')">Hapus</button>
                    </form>
                </td>
            @endif
        </tr>
        <a href="{{ route('event.detail',$event->id) }}"class="btn btn-info btn-sm">Detail</a>
        @endforeach
    </tbody>
</table>
@endsection
