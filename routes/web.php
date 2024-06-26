<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;


require __DIR__ . '/auth.php';

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('pegawais', [PegawaiController::class, 'index'])->name('pegawais.index');
    Route::get('pegawais/create', [PegawaiController::class, 'create'])->name('pegawais.create');
    Route::post('pegawais', [PegawaiController::class, 'store'])->name('pegawais.store');
    Route::get('pegawais/{pegawai}', [PegawaiController::class, 'show'])->name('pegawais.show');
    Route::get('pegawais/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawais.edit');
    Route::put('pegawais/{pegawai}', [PegawaiController::class, 'update'])->name('pegawais.update');
    Route::delete('pegawais/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawais.destroy');
    Route::get('pegawais-data', [PegawaiController::class, 'getPegawaiData'])->name('pegawais.data');
    
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

});




