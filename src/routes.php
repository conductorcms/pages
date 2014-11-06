<?php

Route::group(['namespace' => 'Conductor\\Pages\\Http\\Controllers'], function ()
{
    Route::group(['prefix' => 'admin/api/v1/'], function ()
    {
        Route::get('pages', 'PageController@all');
        Route::post('pages', 'PageController@store');

        Route::get('page/types', 'PageTypeController@all');
        Route::post('page/types', 'PageTypeController@store');

        Route::get('page/{id}', 'PageController@find');
        Route::put('page/{id}', 'PageController@update');
        Route::delete('page/{id}', 'PageController@destroy');

        Route::put('page/type/{id}', 'PageTypeController@update');
        Route::get('page/type/{id}', 'PageTypeController@find');
        Route::delete('page/type/{id}', 'PageTypeController@destroy');
        Route::delete('page/type/area/{id}', 'PageTypeController@destroyArea');

        Route::get('pages/layouts', 'PageController@getLayouts');

    });

});



