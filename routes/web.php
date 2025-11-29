<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\OfferController;
use Illuminate\Http\Request; // <-- Add this import
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// --- MAIN PAGE ROUTES ---

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/prime', function () {
    return Inertia::render('PrimePage');
})->name('prime');

Route::get('/veil-manual', function () {
    return Inertia::render('VeilManualPage');
})->name('veil-manual');

Route::get('/veil-auto', function () {
    return Inertia::render('VeilAutoPage');
})->name('veil-auto');

Route::get('/ultra', function () {
    return Inertia::render('UltraPage');
})->name('ultra');

Route::get('/about-us', function () {
    return Inertia::render('AboutUs');
})->name('about-us');

Route::get('/privacy-policy', function () {
    return Inertia::render('PrivacyPolicy');
})->name('privacy-policy');

Route::get('/master-privacy-policy', function () {
    return Inertia::render('MasterPrivacyPolicy');
})->name('master-privacy-policy');

Route::get('/annex-i', function () {
    return Inertia::render('AnnexI');
})->name('annex-i');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::get('/contact/atabak-shahabadi', function () {
    return Inertia::render('UserContact');
})->name('UserContact');

Route::get('/support', function () {
    return Inertia::render('Support');
})->name('support');

Route::get('/faq', function () {
    return Inertia::render('FAQ');
})->name('faq');

Route::get('/download', function () {
    return Inertia::render('Downloads');
})->name('download');

Route::get('/tutorials', function () {
    return Inertia::render('Tutorials');
})->name('tutorials');

Route::get('terms-of-use', function () {
    return Inertia::render('Terms');
})->name('terms-of-use');


