<?php

use Illuminate\Support\Facades\Route;

Route::get('/coprops', function () {
            return view('index.ph.coprops');
        })->middleware('can:ph_coprop')->name('coprops');
