<?php

Route::get('/admin/api/v1/pages', 'Conductor\Pages\Http\Controllers\PageController@all');
Route::post('/admin/api/v1/pages', 'Conductor\Pages\Http\Controllers\PageController@store');

Route::get('/admin/api/v1/page/types', 'Conductor\Pages\Http\Controllers\PageTypeController@all');
Route::post('/admin/api/v1/page/types', 'Conductor\Pages\Http\Controllers\PageTypeController@store');

Route::get('/admin/api/v1/pages/layouts', 'Conductor\Pages\Http\Controllers\PageController@getLayouts');

