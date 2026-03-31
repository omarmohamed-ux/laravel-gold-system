<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\SaleForm;
use App\Livewire\PurchaseForm;
use App\Http\Controllers\ReportController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/gold-sale', SaleForm::class)->name('gold-sale');
Route::get('/gold-purchase', PurchaseForm::class)->name('gold-purchase');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/reports/viewpdf', [ReportController::class, 'viewPdf'])->name('reports.viewpdf');
Route::get('/reports/generatePdf', [ReportController::class, 'generatePdf'])->name('reports.generatepdf');
Route::get('/reports/viewexcel', [ReportController::class, 'viewexcel'])->name('reports.viewexcel');
Route::get('/reports/generateexcel', [ReportController::class, 'generateexcel'])->name('reports.generateexcel');
Route::get('/reports/ExportExcel', [ReportController::class, 'ExportExcel'])->name('reports.ExportExcel');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
