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
Route::post('/updateCompanies', 'CompanieController@update')->name('companies.update');
Route::post('/rechercheCompanies', 'CompanieController@recherche')->name('companies.recherche');
Route::post('/employeList/{id}', 'CompanieController@employeList')->name('companies.employeList');
Route::post('/companies/{id}', 'CompanieController@destroy')->name('companies.destroy');

//All routes for Employees
Route::get('/employees', 'EmployeeController@index')->name('employees.index');
Route::post('/employees/store', 'EmployeeController@store')->name('employees.store');
Route::post('/updateEmployees', 'EmployeeController@update')->name('employees.update');
Route::post('/rechercheEmployee', 'EmployeeController@recherche')->name('employees.recherche');
Route::post('/employees/{id}', 'EmployeeController@destroy')->name('employees.destroy');
