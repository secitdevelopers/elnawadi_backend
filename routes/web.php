<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/contact/form', [LandingController::class, 'storeWeb'])->name("contact.form");
Route::get('go-payment', [PayPalController::class, 'goPayment'])->name('payment.go');

Route::get('payment',[PayPalController::class, 'payment'])->name('payment');
Route::get('cancel',[PayPalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');
Route::get('/refund/{token}', [PayPalController::class, 'initiateRefund']);



Route::get('landing/page',[LandingController::class, 'index']);

Route::post('/send/notification', [NotificationController::class, 'sendNotificationToUser'])->name('send.notification');

Route::post('/send/notificationToAll', [NotificationController::class, 'sendNotificationToAll'])->name('send.notificationToAll');



require __DIR__.'/auth.php';