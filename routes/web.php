<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middlewares\RoleMiddleware;

Route::get('/test-role', function () {
    return "Middleware Works!";
});

Route::fallback(function(){
    return view('404');
});


Route::get('/', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'store'])->name('login_store');

Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'storeRegister'])->name('register_store');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
   
});
Route::middleware(['auth'])->group(function () {
    Route::resource('/category', App\Http\Controllers\CategoryController::class);
    Route::resource('companies', App\Http\Controllers\CompanyController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    
    Route::post('users/{user}/assign-role', [App\Http\Controllers\UserController::class, 'assignRole'])
        ->name('users.assignRole');
    
});
