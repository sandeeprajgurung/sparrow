<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\FAQController;

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

//Content
Route::middleware(['auth:sanctum', 'verified'])->get('/content/contact', [ContactController::class, 'index'])->name('contact');
Route::middleware(['auth:sanctum', 'verified'])->post('/content/contact', [ContactController::class, 'store'])->name('contact.store');
Route::middleware(['auth:sanctum', 'verified'])->put('/content/contact/{id}', [ContactController::class, 'update'])->name('contact.update');

//Team
Route::middleware(['auth:sanctum', 'verified'])->get('/content/team', [TeamController::class, 'index'])->name('team');
Route::middleware(['auth:sanctum', 'verified'])->post('/content/team', [TeamController::class, 'store'])->name('team.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/content/team/{id}', [TeamController::class, 'edit'])->name('team.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/content/team/{id}', [TeamController::class, 'update'])->name('team.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/content/team/{id}', [TeamController::class, 'destroy'])->name('team.destroy');

//FAQ
Route::middleware(['auth:sanctum', 'verified'])->get('/content/faq', [FAQController::class, 'index'])->name('faq');
Route::middleware(['auth:sanctum', 'verified'])->post('/content/faq', [FAQController::class, 'store'])->name('faq.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/content/faq/{id}', [FAQController::class, 'edit'])->name('faq.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/content/faq/{id}', [FAQController::class, 'update'])->name('faq.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/content/faq/{id}', [FAQController::class, 'destroy'])->name('faq.destroy');