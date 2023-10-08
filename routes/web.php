<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WinactieController;
use App\Http\Controllers\YoutubeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return redirect('/home'); });

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/add-to-cart', [HomeController::class, 'addToCart'])->name('add-to-cart');

Route::post('/remove-from-cart', [HomeController::class, 'removeFromCart'])->name('remove-from-cart');

Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');

Route::post('/checkout', [HomeController::class, 'preparePayment'])->name('prepare-payment');

// voorwaarden, privacy, retour, verzending

Route::get('/voorwaarden', function () { return view('voorwaarden'); })->name('voorwaarden');

Route::get('/privacy', function () { return view('privacy'); })->name('privacy');

Route::get('/retour', function () { return view('retour'); })->name('retour');

Route::get('/verzending', function () { return view('verzending'); })->name('verzending');

Route::get('/payment-success', [HomeController::class, 'paymentSuccess'])->name('order.success');

Route::post('/webhooks/mollie', [HomeController::class, 'handleWebhookNotification'])->name('webhooks.mollie');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
