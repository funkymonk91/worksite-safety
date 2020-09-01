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


Route::get('/', 'HomeController@index')->name('home');

// INQUIRIES
Route::get('/inquiries', 'InquiryController@index')->name('inquiry.index');
Route::get('/contact', 'InquiryController@create')->name('inquiry.create');
Route::post('/contact', 'InquiryController@store')->name('inquiry.store');