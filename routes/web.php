<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.home');
})->name('home');

Route::get('/menu', function () {
    return view('menu', ['seccion' => 'todos']);
})->name('menu');

Route::get('/menu/{categoria}', function ($categoria) {
    return view('menu', ['seccion' => $categoria]);
})->name('menu.categoria');
