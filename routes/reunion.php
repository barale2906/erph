<?php

use Illuminate\Support\Facades\Route;

Route::get('/reunion', function () {
            return view('index.reuniones.reunion');
        })->middleware('can:reu_reunion')->name('reunion');
