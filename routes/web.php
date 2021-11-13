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

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], 
function () {
    Route::get('/', function () {
        return view('layout-admin.master-admin');
    });

    Route::prefix('surat-masuk')->group(function () {
        Route::get('/', 'SuratMasukController@index');
        Route::get('/create-surat-masuk', 'SuratMasukController@createSuratMasuk');
        Route::post('/store-surat-masuk', 'SuratMasukController@storeSuratMasuk');   
    });

    Route::get('/surat-keluar', 'SuratKeluarController@index');
    
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
