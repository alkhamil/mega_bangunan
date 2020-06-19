<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', 'LoginCtrl@index')->name('login.index');
Route::post('/login', 'LoginCtrl@login')->name('login.proses');
Route::get('/', 'HomeCtrl@index')->name('home.index');
Route::get('/survey', 'HomeCtrl@survey')->name('home.survey');
Route::post('/survey/create', 'HomeCtrl@survey_create')->name('survey.create');
Route::get('/feedback', 'HomeCtrl@feedback')->name('survey.feedback');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'DashboardCtrl@index')->name('dashboard.index');

    Route::get('/user', 'UserCtrl@index')->name('user.index');
    Route::post('/user/tambah', 'UserCtrl@tambah')->name('user.tambah');
    Route::post('/user/edit', 'UserCtrl@edit')->name('user.edit');
    Route::get('/user/hapus/{id}', 'UserCtrl@hapus')->name('user.hapus');

    Route::get('/dimensi', 'DimensiCtrl@index')->name('dimensi.index');
    Route::post('/dimensi/tambah', 'DimensiCtrl@tambah')->name('dimensi.tambah');
    Route::post('/dimensi/edit', 'DimensiCtrl@edit')->name('dimensi.edit');
    Route::get('/dimensi/hapus/{id}', 'DimensiCtrl@hapus')->name('dimensi.hapus');

    Route::get('/pernyataan', 'KriteriaCtrl@index')->name('kriteria.index');
    Route::post('/kriteria/tambah', 'KriteriaCtrl@tambah')->name('kriteria.tambah');
    Route::post('/kriteria/edit', 'KriteriaCtrl@edit')->name('kriteria.edit');
    Route::get('/kriteria/hapus/{id}', 'KriteriaCtrl@hapus')->name('kriteria.hapus');
    
    Route::get('/responden', 'RespondenCtrl@index')->name('responden.index');
    Route::get('/responden/cari', 'RespondenCtrl@cari')->name('responden.cari');

    Route::get('/servqual', 'ServqualCtrl@index')->name('servqual.index');

    Route::get('/logout', 'LoginCtrl@logout')->name('logout');
});