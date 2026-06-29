<?php

use Illuminate\Support\Facades\Route;

Route::get('/event', function () {
    return view('event.index');
});
