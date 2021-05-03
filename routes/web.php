<?php
Route::get('hfcm', 'HfcmController@index')->name('hfcm.index');
Route::post('hfcm', 'HfcmController@store')->name('hfcm.store');
