@extends('layouts.app')
@section('content')
<h3>Tambah Kategori</h3>
<hr>
<form action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama"class="form-control">
        @error('nama')
            <small class="text-danger">
                {{ $message }}
            </small>
        @enderror
    </div>
    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('kategori.index') }}"class="btn btn-secondary">Kembali</a>
</form>
@endsection