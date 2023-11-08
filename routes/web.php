<?php

use App\Livewire\{Home,Login, Register, Students, Users};
use App\Mail\NotiMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/',Home::class)->name('home');

// Only for guest users
Route::middleware('guest')->group(function() {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

// Only for Authenticated
Route::middleware('auth')->group(function () {
    Route::get('/students', Students::class)->name('students.index');
});

//Only for Authenticated Admin 
Route::middleware(['admin'])->group(function () {
    Route::get('/users', Users::class)->name('users.index');
});
