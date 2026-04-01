<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\GoldTransactionForm;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/gold-sale', GoldTransactionForm::class)->name('gold-transaction-form');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard'); 

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
