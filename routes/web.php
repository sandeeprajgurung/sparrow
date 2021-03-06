<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'home']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/content', [HomeController::class, 'index'])->name('content.index');

Route::middleware(['auth:sanctum', 'verified'])->post('/content/home', [HomeController::class, 'store'])->name('content.home');

Route::middleware(['auth:sanctum', 'verified'])->get('/services', [ServicesController::class, 'index'])->name('content.services');

Route::middleware(['auth:sanctum', 'verified'])->post('/services', [ServicesController::class, 'store'])->name('content.services.store');
