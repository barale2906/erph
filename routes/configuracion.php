<?php

use Illuminate\Support\Facades\Route;

Route::get('/users', function () {
            return view('index.configuracion.users');
        })->middleware('can:co_users')->name('users');

Route::get('/roles', function () {
            return view('index.configuracion.roles');
        })->middleware('can:co_rols')->name('roles');
