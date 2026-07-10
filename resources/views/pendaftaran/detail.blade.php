@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <img src="{{ asset('storage/'.$event->poster) }}"
            width="250"
            class="mb-3">
        <h3>{{ $event->judul }}</h3>
        <hr>
        <p>
            <b>Kategori :</b>
            {{ $event->kategori->nama }}
        </p>
        <p>
            <b>Lokasi :</b>
            {{ $event->lokasi }}
        </p>
        <p>
            <b>Tanggal :</b>
            {{ $event->tanggal }}
        </p>
        <p>
            <b>Jam :</b>
            {{ $event->jam_mulai }}
            -
            {{ $event->jam_selesai }}
        </p>
        <p>
            <b>Kuota Tersisa :</b>
            {{ $event->sisa_kuota }}
        </p>
        <p>
            {{ $event->deskripsi }}
        </p>
        <form action="{{ route('event.daftar',$event->id) }}"
            method="POST">
            @csrf
            <button class="btn btn-success">
                Daftar Event
            </button>
        </form>
    </div>
</div>
@endsection