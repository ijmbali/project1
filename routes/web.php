<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\temanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teman', [TemanController::class, 'index'])->name('teman.index');
Route::get('/teman/create', [TemanController::class, 'create'])->name('teman.create');
Route::post('/teman', [TemanController::class, 'store'])->name('teman.store');
Route::delete('/teman/{id}', [TemanController::class, 'destroy'])->name('teman.destroy');
Route::get('/teman/{id}/edit', [TemanController::class, 'edit'])->name('teman.edit');
Route::put('/teman/{id}', [TemanController::class, 'update'])->name('teman.update');