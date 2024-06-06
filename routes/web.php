<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/login2', function () {
    return Inertia::render('Views/Login');
})->middleware(['auth', 'verified'])->name('login2');

use App\Http\Controllers\PetController;

Route::post('/pets', [PetController::class, 'store'])->name('pet.create');
Route::get('/pets/{id}', [PetController::class, 'show']);
Route::get('/pet/create', [PetController::class, 'create'])->name('pet.render');
Route::get('/pet/info', [PetController::class, 'info'])->name('pet.info');


use App\Http\Controllers\AppointmentController;

Route::post('/appointments', [AppointmentController::class, 'store'])->name('cita.create');
Route::get('/appointments', [AppointmentController::class, 'index'])->name('cita.info');
Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('cita.render');
Route::get('/appointment/list', [AppointmentController::class, 'list'])->name('home');


use App\Http\Controllers\ProductController;
Route::get('/products', [ProductController::class, 'index'])->name('product.show');