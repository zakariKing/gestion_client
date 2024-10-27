<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VirementController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return redirect()->route('dashboard');
});
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('/client', [ClientController::class, 'index'])->name('client.index');
Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
Route::post('/client', [ClientController::class, 'store'])->name('client.store');
Route::get('/client/{id}', [ClientController::class, 'show'])->name('client.show');
Route::get('/client/{id}/edit', [ClientController::class, 'edit'])->name('client.edit');
Route::put('/client/{id}', [ClientController::class, 'update'])->name('client.update');
Route::delete('/client/{id}', [ClientController::class, 'destroy'])->name('client.destroy');
//crud compte
Route::get('/compte', [CompteController::class, 'index'])->name('compte.index');
Route::get('/compte/create', [CompteController::class, 'create'])->name('compte.create');
Route::post('/compte', [CompteController::class, 'store'])->name('compte.store');
Route::get('/compte/{id}', [CompteController::class, 'show'])->name('compte.show');
Route::get('/compte/{id}/edit', [CompteController::class, 'edit'])->name('compte.edit');
Route::put('/compte/{id}', [CompteController::class, 'update'])->name('compte.update');
Route::delete('/compte/{id}', [CompteController::class, 'destroy'])->name('compte.destroy');
Route::get('/virement', [VirementController::class, 'index'])->name('virement.index');
Route::get('/virement/create', [VirementController::class, 'create'])->name('virement.create');
Route::post('/virement', [VirementController::class, 'store'])->name('virement.store');
