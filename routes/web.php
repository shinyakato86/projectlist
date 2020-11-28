<?php
Route::get('/', 'App\Http\Controllers\IndexController@index')->name('index');

Route::get('/projectlist', 'App\Http\Controllers\ProjectlistController@index')->name('projectlist.index');

Route::get('/review/new', 'App\Http\Controllers\ProjectlistController@create')->name('projectlist.new');
Route::post('/review', 'App\Http\Controllers\ProjectlistController@store')->name('projectlist.store');
Route::get('/review/edit/{id}', 'App\Http\Controllers\ProjectlistController@edit')->name('projectlist.edit');
Route::post('/review/update/{id}', 'App\Http\Controllers\ProjectlistController@update')->name('projectlist.update');

Route::get('/review/{id}', 'App\Http\Controllers\ProjectlistController@show')->name('projectlist.detail');
Route::delete('/review/{id}', 'App\Http\Controllers\ProjectlistController@destroy')->name('projectlist.destroy');

Route::get('/sales_client', 'App\Http\Controllers\SalesController@sales_client')->name('sales.client');

Route::get('/sales_personal', 'App\Http\Controllers\SalesController@sales_personal')->name('sales.personal');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
