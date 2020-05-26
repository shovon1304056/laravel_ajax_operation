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
Route::resource('contacts', 'ContactsController');
Route::get('/all', 'ContactsController@all')->name('all');



Route::get('/prodcats', 'ProductController@prodcats')->name('prodcats');
Route::get('/findProductName', 'ProductController@findProductName')->name('findProductName');
Route::get('/findPrice', 'ProductController@findPrice')->name('findPrice');
