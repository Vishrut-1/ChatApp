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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/fire-event','HomeController@TestEvent')->name('test-event');

Route::get('chatApp','ChatController@index')->name('Chat');
Route::post('chat/add','ChatController@store')->name('AddChat');
