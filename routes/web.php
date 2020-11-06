<?php

Route::view('/','welcome')->name('home');
Route::post('statuses','StatusesController@store')->name('statuses.store');
Route::auth();
