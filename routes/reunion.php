<?php

use Illuminate\Support\Facades\Route;

Route::get('/reunion', function () {
            return view('index.reuniones.reunion');
        })->middleware('can:reu_reunion')->name('reunion');

Route::get('/votacion', function () {
            return view('index.reuniones.votacion');
        })->middleware('can:reu_votacion')->name('votacion');
