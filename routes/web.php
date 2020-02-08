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

Route::get('auth/login', function () {
    return view('login.login');
})->name('login');

Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('manage.manage_dashboard');
    });

    Route::get('/modal', function () {
        return view('bond_history.modal');
    });

Route::get('manage/datatables', 'ManageCrontroller@getTable');
Route::get('manage/active/{id}', 'ManageCrontroller@active');
Route::get('add', 'ManageCrontroller@create');
Route::delete('manage/{id}', 'ManageCrontroller@delete');
Route::resource('manage' , 'ManageCrontroller')->except(['destroy']);
Route::get('export','ManageCrontroller@export')->name('export');

Route::resource('manage' , 'ManageCrontroller')->except(['destroy']);


});





