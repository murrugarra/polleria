<?php

use Illuminate\Support\Facades\Route;

// Rutas del cliente
Route::get('/', function () {
    return view('client.home');
})->name('home');

Route::get('/menu', function () {
    return view('menu', ['seccion' => 'todos']);
})->name('menu');

Route::get('/menu/{categoria}', function ($categoria) {
    return view('menu', ['seccion' => $categoria]);
})->name('menu.categoria');


// Rutas del administrador (puedes agruparlas por prefijo)
Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('admin.login');
    })->name('admin.login');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/categorias', function () {
        // Pasar 'seccion' a la vista para control de scripts
        return view('admin.categorias', ['seccion' => 'categorias']);
    })->name('admin.categorias');
});

