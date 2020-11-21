<?php
Route::get('/', 'App\Http\Controllers\IndexController@index')->name('index');

Route::get('/projectlist', 'App\Http\Controllers\ProjectlistController@index')->name('projectlist.index');

Route::get('/review/new', 'App\Http\Controllers\ProjectlistController@create')->name('projectlist.new');
Route::post('/review', 'App\Http\Controllers\ProjectlistController@store')->name('projectlist.store');
Route::get('/review/edit/{id}', 'ShopController@edit')->name('shop.edit');
Route::post('/review/update/{id}', 'ShopController@update')->name('shop.update');

Route::get('/review/{id}', 'ShopController@show')->name('shop.detail');
Route::delete('/review/{id}', 'ShopController@destroy')->name('shop.destroy');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
