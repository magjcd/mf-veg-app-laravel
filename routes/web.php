<?php

use App\Http\Controllers\APIs\AuthController;
use Illuminate\Support\Facades\Route;


// Route::get('/',[AuthController::class,'check']);
// Route::middleware('auth:sanctum')->group(function () {
    // Route::get('/check', [AuthController::class, 'check'])->name('check');
// });


Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::middleware('auth')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::view('/users', 'admin.users')->name('users');
    Route::get('/logout', function () {
        auth()->logout();
        return redirect()->route('login');
    })->name('logout');
});
