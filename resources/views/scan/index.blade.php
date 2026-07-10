@extends('layouts.app')
@section('content')
<h3>Scan QR Kehadiran</h3>
<hr>
<form action="{{ route('scan.proses') }}" method="POST">
    @csrf
    <label>QR Code</label>
    <input type="text" name="kode" class="form-control">
    <br>
    <button class="btn btn-primary">Scan</button>
</form>
@endsection