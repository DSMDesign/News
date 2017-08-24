<?php

Route::group(array( 'middleware' => ['web', 'auth'],
                    'prefix'     => config('variables.prefix'),
                    'namespace'  => 'Southcoastweb\News\Controllers'), function() {

    Route::get( 'news',                 'NewsController@index')->name('admin.news');
    Route::get( 'news/create',          'NewsController@create')->name('admin.article.create');
    Route::post('news/store',           'NewsController@store')->name('admin.article.store');
    Route::get( 'news/edit/{article}',  'NewsController@edit')->name('admin.article.edit');
    Route::post('news/edit/{article}',  'NewsController@update')->name('admin.article.update');
    Route::get( 'news/show/{article}',  'NewsController@show')->name('admin.article.show');
    Route::get( 'news/{article}',       'NewsController@view')->name('admin.article');
});
