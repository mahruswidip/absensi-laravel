<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
    // redirect to /admin
   // return redirect('/admin');
//});
Route::get('/test-session', function () {
    session(['foo' => 'bar']);
    return session('foo'); // harus tampil 'bar' di browser
});
