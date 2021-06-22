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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/welcome', 'HomeController@index')->name('welcome');

Route::get('/dashboard','DashboardController@index');

Route::group(['middleware' => ['role:admin']], function () {

    // manajemen data guru
    Route::get('data-guru','GuruController@index');
    Route::get('data-guru/create','GuruController@create');
    Route::post('data-guru/create/post','GuruController@store');
    Route::get('data-guru/edit/{id}','GuruController@edit');
    Route::post('data-guru/edit/post/{id}','GuruController@update');
    Route::get('data-guru/hapus/{id}','GuruController@hapus');

    // manajemen data user
    Route::get('data-user','UserController@index');
    Route::get('data-user/create','UserController@create');
    Route::post('data-user/create/post','UserController@store');
    Route::get('data-user/edit/{id}','UserController@edit');
    Route::post('data-user/edit/post/{id}','UserController@update');
    Route::get('data-user/hapus/{id}','UserController@hapus');
});


Route::group(['middleware' => ['role:admin|guru']], function () {
    // manajemen data siswa
    Route::get('data-siswa','SiswaController@index');
    Route::get('data-siswa/create','SiswaController@create');
    Route::post('data-siswa/create/post','SiswaController@store');
    Route::get('data-siswa/edit/{id}','SiswaController@edit');
    Route::post('data-siswa/edit/post/{id}','SiswaController@update');
    Route::get('data-siswa/hapus/{id}','SiswaController@hapus');
});

Route::group(['middleware' => ['role:guru']], function () {

    // tabungan
    Route::get('tabungan','TabunganController@index');
    Route::get('tabungan/create','TabunganController@create');
    Route::post('tabungan/create/post','TabunganController@store');
    Route::get('tabungan/edit/{id}','TabunganController@edit');
    Route::post('tabungan/edit/post/{id}','TabunganController@update');
    Route::get('tabungan/hapus/{id}','TabunganController@hapus');

    // history
    Route::get('history-transaksi','HistoryTransaksi@index');
    Route::get('history-transaksi/cetak_pdf', 'HistoryTransaksi@cetak_pdf');

    // penarikan
    Route::get('penarikan','PenarikanController@index');
    Route::get('penarikan/{id}','PenarikanController@create');
    Route::post('penarikan/create/post/{id}','PenarikanController@store');
    Route::get('penarikan/edit/{id}','PenarikanController@edit');
    Route::post('penarikan/edit/post/{id}','PenarikanController@update');
    Route::get('penarikan/hapus/{id}','PenarikanController@hapus');
});

