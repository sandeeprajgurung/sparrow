<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ExternalServiceController;
use App\Http\Controllers\ExternalServiceDetailController;
use App\Http\Controllers\AboutController;

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
Route::get('/services', [PagesController::class, 'services']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/content', [HomeController::class, 'index'])->name('content.index');

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
Route::middleware(['auth:sanctum', 'verified'])->post('/content/home', [HomeController::class, 'store'])->name('content.home');

//Services
Route::middleware(['auth:sanctum', 'verified'])->get('/services', [ServicesController::class, 'index'])->name('content.services');
Route::middleware(['auth:sanctum', 'verified'])->post('/services', [ServicesController::class, 'store'])->name('content.services.store');

//Testimonial
Route::middleware(['auth:sanctum', 'verified'])->get('/content/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
Route::middleware(['auth:sanctum', 'verified'])->post('/content/testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
Route::middleware(['auth:sanctum', 'verified'])->delete('/content/testimonial/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
Route::middleware(['auth:sanctum', 'verified'])->get('/content/testimonial/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/content/testimonial/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');

//External Service
Route::middleware(['auth:sanctum', 'verified'])->get('/content/service', [ExternalServiceController::class, 'index'])->name('service');
Route::middleware(['auth:sanctum', 'verified'])->post('/content/service', [ExternalServiceController::class, 'store'])->name('service.store');
Route::middleware(['auth:sanctum', 'verified'])->delete('/content/service/{id}', [ExternalServiceController::class, 'destroy'])->name('service.destroy');
Route::middleware(['auth:sanctum', 'verified'])->get('/content/service/{id}', [ExternalServiceController::class, 'edit'])->name('service.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/content/service/{id}', [ExternalServiceController::class, 'update'])->name('service.update');

//External Service Details
Route::middleware(['auth:sanctum', 'verified'])->get('/content/servicedetail', [ExternalServiceDetailController::class, 'index'])->name('servicedetail');
Route::middleware(['auth:sanctum', 'verified'])->post('/content/servicedetail', [ExternalServiceDetailController::class, 'store'])->name('servicedetail.store');
Route::middleware(['auth:sanctum', 'verified'])->delete('/content/servicedetail/{id}', [ExternalServiceDetailController::class, 'destroy'])->name('servicedetail.destroy');
Route::middleware(['auth:sanctum', 'verified'])->get('/content/servicedetail/{id}', [ExternalServiceDetailController::class, 'edit'])->name('servicedetail.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/content/servicedetail/{id}', [ExternalServiceDetailController::class, 'update'])->name('servicedetail.update');

//About Us
Route::middleware(['auth:sanctum', 'verified'])->get('/content/about', [AboutController::class, 'index'])->name('about');
Route::middleware(['auth:sanctum', 'verified'])->post('/content/about', [AboutController::class, 'store'])->name('about.store');
Route::middleware(['auth:sanctum', 'verified'])->delete('/content/about/{id}', [AboutController::class, 'destroy'])->name('about.destroy');
Route::middleware(['auth:sanctum', 'verified'])->get('/content/about/{id}', [AboutController::class, 'edit'])->name('about.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/content/about/{id}', [AboutController::class, 'update'])->name('about.update');
Route::middleware(['auth:sanctum', 'verified'])->put('/content/about/status/{id}', [AboutController::class, 'updateStatus'])->name('about.updateStatus');

