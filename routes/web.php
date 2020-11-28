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

Route::middleware('auth')->group(function ()
{
	Route::get('/', 'HomeController@index')->name('home');
	
	Route::view('/change_password', 'change_password');
	Route::post('/change_password', 'HomeController@changePassword')->name('change.password');

	Route::post('/category/datatables', 'CategoryController@datatables')->name('category.datatables');
	Route::post('/stuff/datatables', 'StuffController@datatables')->name('stuff.datatables');
	Route::post('/datatables', 'UserController@datatables')->name('user.datatables');

	Route::prefix('supplier')->name('supplier.')->group(function ()
	{
		Route::get('/print/', 'SupplierController@print')->name('print');
		Route::post('/datatables', 'SupplierController@datatables')->name('datatables');
	});

	Route::prefix('activity')->name('activity.')->group(function ()
	{
		Route::get('/add', 'ActivityController@add')->name('add');
		Route::get('/remove', 'ActivityController@remove')->name('remove');
		
		Route::post('/store', 'ActivityController@store')->name('store');
	});

	Route::prefix('loan')->name('loan.')->group(function ()
	{
		Route::post('/datatables', 'LoanController@datatables')->name('datatables');
	});

	Route::prefix('report')->name('report.')->group(function ()
	{
		Route::get('/', 'ReportController@index')->name('index');
		Route::get('/show', 'ReportController@show')->name('show');
		Route::get('/print', 'ReportController@print')->name('print');
	});

	Route::prefix('setting')->name('setting.')->group(function ()
	{
		Route::view('/', 'setting')->name('index');
		Route::post('/update', 'SettingController@update')->name('update');
	});

	Route::resource('/category', 'CategoryController', ['except' => ['edit', 'show']]);
	Route::resource('/stuff', 'StuffController');
	Route::resource('/loan', 'LoanController');
	Route::resource('/supplier', 'SupplierController');
	Route::resource('/user', 'UserController');
});

Route::namespace('Auth')->group(function ()
{
	Route::get('/login', 'LoginController@showLoginForm')->name('login');
	Route::get('/logout', 'LoginController@logout')->name('logout');
	Route::post('/login', 'LoginController@login')->name('login');

});