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

Route::get('/', function () {
    if (!Auth::check()) {
        return view('auth.login');
    }
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']],
function () {
    Route::get('/', function () {
        return view('layout-admin.master-admin');
    });
    Route::get('/surat-masuk', 'SuratMasukController@index');
    Route::get('/surat-keluar', 'SuratKeluarController@index');
});

// Route::get('/admin', function () {
//     return view('layout-admin.master-admin');
// });



Route::get('/example-page', function () {
    return view('layout-admin.example-page-content');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
