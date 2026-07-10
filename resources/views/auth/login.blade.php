@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">Login</div>
                <div class="card-body">
                <form action="/login" method="POST">
                @csrf
                <input type="email" name="email" class="form-control mb-3" placeholder="Email">
                <input type="password" name="password" class="form-control mb-3" placeholder="Password">
                <button class="btn btn-success w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection