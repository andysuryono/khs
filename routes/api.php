<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('jurusans', 'JurusanAPIController');

Route::resource('dosens', 'DosenAPIController');

Route::resource('mata_kuliahs', 'MataKuliahAPIController');

Route::resource('mahasiswas', 'MahasiswaAPIController');

Route::resource('semesters', 'SemesterAPIController');

Route::resource('studies', 'StudyAPIController');
Route::get('cetak', 'StudyAPIController@cetak');

Route::resource('admins', 'AdminAPIController');
Route::post('login', 'LoginController@login');