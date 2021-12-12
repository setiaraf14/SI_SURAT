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
    return view('auth.login');
});

Route::get('/desposisi', function () {
    return view('surat-masuk.desposisi');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], 
function () {
    // Route::get('/', function () {
    //     return view('layout-admin.master-admin');
    // });
    Route::get('/', 'DashboardController@dashboard');
    Route::prefix('surat-masuk')->group(function () {
        Route::get('/', 'SuratMasukController@index');
        Route::get('/create-surat-masuk', 'SuratMasukController@createSuratMasuk');
        Route::post('/store-surat-masuk/{id?}', 'SuratMasukController@storeSuratMasuk');
        Route::get('/delete-surat-masuk/{id}', 'SuratMasukController@deleteSuratMasuk'); 
        Route::get('/edit-surat-masuk/{id}', 'SuratMasukController@createSuratMasuk');
        Route::get('/show-surat-masuk/{id}', 'SuratMasukController@showSuratMasuk');
        Route::get('/status-aprove/{id}', 'SuratMasukController@changeStatusAprove');
        Route::get('/status-disaprove/{id}', 'SuratMasukController@changeStatusDisprove');
        Route::get('/print/{id}', 'SuratMasukController@printDesposisi');
    });

    Route::prefix('surat-keluar')->group(function () {
        Route::get('/', 'SuratKeluarController@index');
        Route::get('/create-surat-keluar', 'SuratKeluarController@createSuratKeluar');
        Route::post('/store-surat-keluar/{id?}', 'SuratKeluarController@storeSuratKeluar');
        Route::get('/delete-surat-keluar/{id}', 'SuratKeluarController@deleteSuratKeluar'); 
        Route::get('/edit-surat-keluar/{id}', 'SuratKeluarController@createSuratKeluar');
        Route::get('/show-surat-keluar/{id}', 'SuratKeluarController@showSuratKeluar');
    });
    
    Route::group(['prefix' => 'index-surat'], function (){
        Route::get('/', 'IndexSuratController@index');
        Route::post('/store-index-surat/{id?}', 'IndexSuratController@storeIndexSurat');
        Route::get('/delete-index-surat/{id}', 'IndexSuratController@deleteIndexSurat');
    });

});

// Route::get('/admin', function () {
//     return view('layout-admin.master-admin');
// });



Route::get('/example-page', function () {
    return view('layout-admin.example-page-content');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
