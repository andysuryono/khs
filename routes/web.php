<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('jurusans', 'JurusanController');

Route::resource('dosens', 'DosenController');

Route::resource('mataKuliahs', 'MataKuliahController');

Route::resource('mahasiswas', 'MahasiswaController');

Route::resource('semesters', 'SemesterController');

Route::resource('studies', 'StudyController');

Route::resource('admins', 'AdminController');