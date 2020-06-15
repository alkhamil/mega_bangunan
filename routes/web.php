<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', 'LoginCtrl@index')->name('login.index');
Route::post('/login', 'LoginCtrl@login')->name('login.proses');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'DashboardCtrl@index')->name('dashboard.index');
    Route::get('/dashboard', 'DashboardCtrl@index')->name('dashboard.index');

    Route::get('/user', 'UserCtrl@index')->name('user.index');
    Route::post('/user/tambah', 'UserCtrl@tambah')->name('user.tambah');

    Route::get('/dimensi', 'DimensiCtrl@index')->name('dimensi.index');
    Route::post('/dimensi/tambah', 'DimensiCtrl@tambah')->name('dimensi.tambah');

    Route::get('/kriteria', 'KriteriaCtrl@index')->name('kriteria.index');
    Route::post('/kriteria/tambah', 'KriteriaCtrl@tambah')->name('kriteria.tambah');


    Route::get('/logout', 'LoginCtrl@logout')->name('logout');
});