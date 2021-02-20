<?php
Route::get('change-language/{locale}',['as'=>'frontend_change_locale','uses'=>'GeneralController@changeLocale']);
Route::get('/','InvoceController@index')->name('index');
//Route::get('/','InvoceController@index')->name('index');
Route::get('invoce/print/{id}',['as'=>'invoce.print','uses'=>'InvoceController@print']);
Route::get('invoce/pdf/{id}',['as'=>'invoce.pdf','uses'=>'InvoceController@pdf']);
Route::get('invoce/send_to_email/{id}',['as'=>'invoce.send_to_email','uses'=>'InvoceController@send_to_email']);


Route::resource('/invoce','InvoceController');
