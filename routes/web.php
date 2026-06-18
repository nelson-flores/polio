<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware([App\Http\Middleware\auth::class])->get('/', App\Livewire\Home::class)->name('app');
Route::middleware([App\Http\Middleware\guest::class])->get('/signup', App\Livewire\Signup::class)->name('signup');
Route::middleware([App\Http\Middleware\guest::class])->get('/login', App\Livewire\Login::class)->name('login');
Route::get('/out', function(){
    Auth::logout();
    return redirect()->back();
})->name('logout');
