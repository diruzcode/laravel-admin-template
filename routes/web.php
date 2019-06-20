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
//\URL::forceScheme('https');


Route::get('/', 'Dashboard\HomeController@index')->name('index');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login.form');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.change');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::get('/password/reset/{token} ', 'Auth\ResetPasswordController@showResetForm');


Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'as' => 'dashboard::'], function () {


  Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('index');

    Route::resource('/users', 'UserController', ['except' => ['show']]);
    Route::get('/users/{user}/access', 'UserController@toggleAccess')->name('users.toggleAccess');
    Route::get('/users/export', 'UserController@export')->name('users.export');

    Route::resource('/roles', 'RoleController', ['except' => ['show']]);
    Route::resource('/permissions', 'PermissionController', ['except' => ['show']]);
    Route::get('/common/slug/{name}', 'CommonController@slug')->name('common.slug');

    Route::get('/pdfs', 'PdfController@index')->name('pdfs.index');
    Route::post('/pdfs/generate', 'PdfController@export_document_generate')->name('pdfs.export_document_generate');
    Route::post('/pdfs/url', 'PdfController@export_document_url')->name('pdfs.export_document_url');
    Route::get('/pdfs/view', 'PdfController@export_by_view')->name('pdfs.export_by_view');


  });



});


/*
|--------------------------------------------------------------------------
| Ruta especifica para visualizar paginas estáticas.
|--------------------------------------------------------------------------
|
| Esta ruta permite visualizar paginas estáticas siempre que se las pida
| a través de la extensión "html".
|
*/
