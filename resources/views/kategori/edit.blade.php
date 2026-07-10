@extends('layouts.app')
@section('content')
<h3>Edit Kategori</h3>
<hr>
<form action="{{ route('kategori.update',$kategori->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input
            type="text"
            name="nama"
            class="form-control"
            value="{{ old('nama',$kategori->nama) }}">
        @error('nama')
            <small class="text-danger">
                {{ $message }}
            </small>
        @enderror
    </div>
    <button class="btn btn-primary">
        Update
    </button>
    <a href="{{ route('kategori.index') }}"
       class="btn btn-secondary">
        Kembali
    </a>
</form>
@endsection