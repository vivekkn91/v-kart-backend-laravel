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
Route::get('/allitems', 'App\Http\Controllers\InventoryController@getinventoty')->name('allitems');
Route::get('/addtype', 'App\Http\Controllers\InventoryController@gettypes')->name('addtype');
Route::get('/inventory', 'App\Http\Controllers\InventoryController@index')->name('map');
Route::get('/inventory/sales', 'App\Http\Controllers\InventoryController@sales');


Route::get('/', function () {
    return view('welcome');
});
Route::put('/edit', 'App\Http\Controllers\InventoryController@edit')->name('invetory.edit');
Route::post('/update', 'App\Http\Controllers\InventoryController@update')->name('invetory.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/inventory', 'App\Http\Controllers\InventoryController@create')->name('invetory.create');
Route::post('/createtype', 'App\Http\Controllers\FoodtypeController@createtype')->name('foodtype.createtype');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
