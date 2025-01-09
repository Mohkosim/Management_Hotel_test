<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UnitGroupController;
use App\Http\Controllers\RatePlanController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Invoice_FoliosController;
use App\Http\Controllers\HouseKeepingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;

// Dashboard
// Route::get('/', function () {
//     return view('dashboard', ['title' => 'Dashboard']);
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Room 
Route::resource('/room/unit-groups', UnitGroupController::class);
Route::resource('/room/units', UnitController::class);
Route::get('/rate-plans/{unitGroupId}', [UnitController::class, 'getRatePlansByRoomType']);

// Guests
Route::resource('/guests', GuestController::class);

// Reservations
// Route::resource('/reservations', ReservationController::class);
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
Route::post('/reservations/restore-all', [ReservationController::class, 'restoreAll'])->name('reservations.restoreAll');

Route::get('/reservations/{id}/edit/{edit?}', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::put('/reservations/{id}/update1', [ReservationController::class, 'update1'])->name('reservations.update1');
Route::put('/reservations/{id}/update2', [ReservationController::class, 'update2'])->name('reservations.update2');
Route::put('/reservations/{id}/update3', [ReservationController::class, 'update3'])->name('reservations.update3');

Route::get('/reservations/create/{step?}', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservations/step1', [ReservationController::class, 'postStep1'])->name('reservations.postStep1');
Route::post('/reservations/step2', [ReservationController::class, 'postStep2'])->name('reservations.postStep2');
Route::post('/reservations/step3', [ReservationController::class, 'postStep3'])->name('reservations.postStep3');
Route::post('/reservations/step4', [ReservationController::class, 'postStep4'])->name('reservations.postStep4');


Route::post('/payments/store', [PaymentController::class, 'store'])->name('payments.store');



Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookers.update');

Route::get('/bookings/create/{step?}', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings/step1/{bookerId}', [BookingController::class, 'postStep1'])->name('bookings.postStep1');
Route::post('/bookings/step2/{bookerId}', [BookingController::class, 'postStep2'])->name('bookings.postStep2');
Route::post('/bookings/step3/{bookerId}', [BookingController::class, 'postStep3'])->name('bookings.postStep3');



// Housekeeping
// Route::get('/housekeeping', function () {
//     return view('housekeeping.index', ['title' => 'Housekeeping']);
// });

Route::get('/housekeeping', [HouseKeepingController::class, 'index'])->name('housekeeping.index');
Route::post('/housekeeping/update-status/{id}', [HouseKeepingController::class, 'updateStatus'])->name('housekeeping.updateStatus');
Route::get('/housekeeping/units', [HouseKeepingController::class, 'getUnitData'])->name('housekeeping.getUnitData');
Route::get('/housekeeping/unit-groups', [HouseKeepingController::class, 'getUnitGroup'])->name('housekeeping.getUnitGroup');
Route::get('/housekeeping/search', [HouseKeepingController::class, 'searchData'])->name('housekeeping.searchData');

// Sales
Route::resource('/sales/rate-plans', RatePlanController::class);

// Finance
Route::prefix('finance')->group(function () {
    Route::get('/invoice', [Invoice_FoliosController::class, 'indexInvoice']);
    Route::get('/folios', [Invoice_FoliosController::class, 'indexFolios']);

    Route::get('/folios/report', [Invoice_FoliosController::class, 'generatePDFReport']);
    Route::get('/invoice/pdf/{id}', [Invoice_FoliosController::class, 'generatePdfinvoice']);
    Route::get('/folios/pdf/{id}', [Invoice_FoliosController::class, 'generatePdffolios']);
});

// General Manager
