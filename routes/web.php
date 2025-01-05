<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::redirect('/', 'about');

Route::get('/about', function () {
    return 'Hello from about page';
});

Route::get('/users/{id}', function ($id) {
    return $id;
})->where('id', '[a-zA-Z]+');