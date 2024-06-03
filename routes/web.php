<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prompt', [ImageController::class, 'prompt']);
Route::post('/generate', [ImageController::class, 'generate'])->name('generate');
Route::get('/viewimage', [ImageController::class, 'viewimage'])->name('viewimage');
Route::post('/findobject', [ImageController::class, 'findobject'])->name('findobject');