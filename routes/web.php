<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::redirect('/', 'about');

// Route::get('/about', function () {
//     return
// });

Route::get('/users', [UserController::class, 'index'])->name('users');

Route::get('/users/{id}', function ($id) {
    return $id;
})->where('id', '[0-9]+');