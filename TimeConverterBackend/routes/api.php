<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\TimeController;

Route::controller(BatchController::class)->prefix('batches')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get("/{id}", 'show');
    Route::put("/{id}", 'update');
    Route::delete("/{id}", 'destroy');
});

Route::controller(TimeController::class)->prefix('times')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get("/batch/{id}", 'timesByBatch');
    Route::get("/{id}", 'show');
    Route::put("/{id}", 'update');
    Route::delete("/{id}", 'destroy');
});
