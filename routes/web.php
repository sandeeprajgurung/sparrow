<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/content', [PagesController::class, 'content'])->name('content');

// Route::resource('content/contact','ContactController');

Route::middleware(['auth:sanctum', 'verified'])->get('/content/contact', [ContactController::class, 'index'])->name('contact');

// Route::resource('contact',ContactController::class);

Route::middleware(['auth:sanctum', 'verified'])->post('/content/contact', [ContactController::class, 'store'])->name('contact.store');

// require_once '../vendor/laravel/jetstream/routes/livewire.php';
