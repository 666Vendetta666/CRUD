<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/clients/pdf', [PdfController::class, 'generatePdf'])->name('clients.pdf');
Route::get('/orders/pdf', [PdfController::class, 'generatePdf'])->name('orders.pdf');
Route::get('/pdf', [App\Http\Controllers\PdfController::class, 'generatePdf']);
Route::resource('clients',App\Http\Controllers\ClientController::class)->middleware('auth');
Route::resource('orders',App\Http\Controllers\OrderController::class)->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
