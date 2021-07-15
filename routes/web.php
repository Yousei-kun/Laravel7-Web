<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//})->name('welcome');
//PilotJinix

Route::get('/', 'LoginController@welcome')->name('welcome');

Route::get('register', 'RegisterController@index' )->name('register');
//Route::post('register/check', 'RegisterController@check')->name('register-check');
//Pilot Jinix
Route::post('register/input', 'RegisterController@register')->name('register-input');

Route::get('login', 'LoginController@index' )->name('login');
//Route::post('login', 'LoginController@auth')->name('login-auth');
//Pilot Jinix
Route::post('login', 'LoginController@authenticate')->name('login-auth');


Route::group(['middleware' => ['rolecheck:admin,teacher']], function () {
    Route::get('admin/dashboard', 'DashboardController@index' )->name('dashboard');
    Route::get('admin/logout', 'DashboardController@logout' )->name('logout');
    Route::get('admin/mahasiswa', 'MahasiswaController@index')->name('mahasiswa');
});

Route::group(['middleware' => ['rolecheck:admin']], function () {
    Route::post('admin/mahasiswa/create', 'MahasiswaController@create')->name('mahasiswa-create');
    Route::post('admin/mahasiswa/edit/{id}', 'MahasiswaController@edit')->name('mahasiswa-edit');
    Route::post('admin/mahasiswa/delete/{id}', 'MahasiswaController@destroy')->name('mahasiswa-delete');
});






