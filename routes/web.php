<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\SaleForm;
use App\Livewire\PurchaseForm;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/gold-sale', SaleForm::class)->name('gold-sale');
Route::get('/gold-purchase', PurchaseForm::class)->name('gold-purchase');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
