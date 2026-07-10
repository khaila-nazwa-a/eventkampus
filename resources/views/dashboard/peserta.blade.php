@extends('layouts.app')
@section('content')
<h2>Dashboard Peserta</h2>
<hr>
<div class="card">
    <div class="card-body">
        Selamat datang,
        <b>{{ auth()->user()->name }}</b>
        <hr>
        <p>
            Silakan lihat event yang tersedia dan lakukan pendaftaran.
        </p>
    </div>
</div>
@endsection