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
})->name('welcome');

//Auth::routes();


Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'TicketController@index')->name('home');
Route::get('/ticket/new', 'TicketController@new')->name('ticket-new');
Route::post('/ticket/save', 'TicketController@store')->name('ticket-store');
Route::get('/ticket/{ticket}/edit', 'TicketController@edit')->name('ticket-edit');
Route::post('/ticket/{ticket}/update', 'TicketController@update')->name('ticket-update');
