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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Toutes les routes pour companies
//All routes for companies
Route::get('/companies', 'CompanieController@index')->name('companies.index');
Route::post('/companies/store', 'CompanieController@store')->name('companies.store');
Route::post('/update', 'CompanieController@update')->name('companies.update');
Route::post('/recherche', 'CompanieController@recherche')->name('companies.recherche');
Route::post('/employeList/{id}', 'CompanieController@employeList')->name('companies.employeList');
Route::post('/companies/{id}', 'CompanieController@destroy')->name('companies.destroy');

//All routes for Employees
Route::get('/companies', 'CompanieController@index')->name('companies.index');
Route::post('/companies/store', 'CompanieController@store')->name('companies.store');
Route::post('/update', 'CompanieController@update')->name('companies.update');
Route::post('/recherche', 'CompanieController@recherche')->name('companies.recherche');
Route::post('/companies/{id}', 'CompanieController@destroy')->name('companies.destroy');
