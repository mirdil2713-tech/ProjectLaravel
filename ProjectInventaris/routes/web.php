<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/items/create', [itemController::class, 'create'])->name('items.create');

Route::post('/items', [itemController::class, 'store'])->name('items.store');
