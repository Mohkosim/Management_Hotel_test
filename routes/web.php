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

// Dashboard
Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
});

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
// Route::resource('/finance/document_invoice', PaymentController::class);
// Route::resource('/finance/invoice_folios', Invoice_FoliosController::class);

Route::get('/finance/invoice', [Invoice_FoliosController::class, 'indexInvoice']);
Route::get('/finance/folios/report', [Invoice_FoliosController::class, 'generatePDFReport']);
Route::get('/finance/invoice/pdf/{id}', [Invoice_FoliosController::class, 'generatePdfinvoice']);
Route::get('/finance/folios/pdf/{id}', [Invoice_FoliosController::class, 'generatePdffolios']);


// General Manager
