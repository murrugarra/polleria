<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/categories/datatable', [CategoryController::class, 'getCategoriesDatatable'])->name('api.categories.datatable');


// Resto de rutas
Route::get('/categories', [CategoryController::class, 'index'])->name('api.categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('api.categories.show');
Route::post('/categories', [CategoryController::class, 'store'])->name('api.categories.store');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('api.categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('api.categories.destroy');