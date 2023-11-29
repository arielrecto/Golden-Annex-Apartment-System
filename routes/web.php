<?php

use App\Models\Room;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Tenant\PaymentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AnnoucementController;
use App\Http\Controllers\Admin\MaintenanceController;
use App\Http\Controllers\Tenant\AnnouncementController;
use App\Http\Controllers\Tenant\BillController as TenantBillController;
use App\Http\Controllers\Tenant\DashboardController as TenantDashboardController;
use App\Http\Controllers\Tenant\MaintenanceController as TenantMaintenanceController;

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

    $rooms = Room::where('status', 'Available')->get();

    return view('welcome', compact(['rooms']));
})->name('landingPage');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/request', [InboxController::class, 'store'])->name('send.request');

Route::middleware('auth')->group(function() {


    Route::prefix('inbox')->as('inbox.')->group(function(){
        Route::get('/', [InboxController::class, 'index'])->name('index');
        Route::post('/delete/{inbox}', [InboxController::class, 'destroy'])->name('destroy');
        Route::get('/{index}/show', [InboxController::class, 'show'])->name('show');
        Route::post('/email/send', [InboxController::class, 'sendEmail'])->name('emailSend');

    });

    Route::prefix('pdf')->as('pdf.')->group(function(){
        Route::get('/bill/{bill}/download', [PDFController::class, 'billPDF'])->name('bill');
        Route::get('bills/download', [PDFController::class, 'billsPDF'])->name('bills.download');
    });

    Route::middleware('role:admin')->prefix('admin')->as('admin.')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::prefix('room')->as('room.')->group(function(){
            Route::post('/{room}/bill/create/', [RoomController::class, 'addBill'])->name('addBill');
        });
        Route::resource('room', RoomController::class);
        Route::resource('tenant', TenantController::class);
        Route::resource('bill', BillController::class);
        Route::resource('announcement', AnnoucementController::class);
        Route::resource('maintenance', MaintenanceController::class);
    });
    Route::middleware('role:tenant')->prefix('tenant')->as('tenant.')->group(function(){
        Route::get('/dashboard', [TenantDashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('maintenance', TenantMaintenanceController::class);
        Route::resource('announcement', AnnouncementController::class);
        Route::resource('bill', TenantBillController::class)->only('show');
        Route::resource('payment', PaymentController::class);
    });
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
