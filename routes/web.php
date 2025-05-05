<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::prefix('role')->group(function () {
    Route::get("/", [RoleController::class, 'index'])->name('role.index');
    Route::get("/add", [RoleController::class, 'create'])->name('role.create');
    Route::get("/edit/{id}", [RoleController::class, 'edit'])->name('role.edit');
    Route::post("/update/{id}", [RoleController::class, 'update'])->name('role.update');
    Route::get("/search", [RoleController::class, 'search'])->name('role.search');
});

Route::prefix('user')->group(function () {
    Route::get("/", [UserController::class, 'index'])->name('user.index');
});

Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'loginForm'])->name('login');
    Route::post("/", [LoginController::class, 'authenticate'])->name('auth.login');
});
