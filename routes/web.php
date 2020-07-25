<?php
use Illuminate\Http\Request;
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
Route::get('/todos','todocontroller@index')->name('todo.index');
Route::get('/todos/create','todocontroller@create');
Route::get('/todos/edit','todocontroller@edit');
Route::get('/todos/{todo}/edit','todocontroller@edit')->name('todo.edit');
Route::put('/todos/{todo}/complete','todocontroller@complete')->name('todo.complete');
Route::delete('/todos/{todo}/incomplete','todocontroller@incomplete')->name('todo.incomplete');
Route::delete('/todos/{todo}/delete','todocontroller@delete')->name('todo.delete');
Route::patch('/todos/{todo}/update','todocontroller@update')->name('todo.update');
Route::post('/todos/create','todocontroller@store');
Route::get('/todos/{todo}/show','todocontroller@show')->name('todo.show');



Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('home');
});

Route::get('/user', 'usercontroller@index');
Route::get('/user2', 'usercontroller@index2');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::post('/upload','usercontroller@uploadImage');

Route::get('/home', 'HomeController@index')->name('home');
