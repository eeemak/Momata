<?php


// Website
Route::get('/', ['as'=>'home', 'uses'=>'WebsiteController@home']);
Route::get('/our-causes', ['as'=>'our_causes', 'uses'=>'WebsiteController@our_causes']);
Route::get('/news', ['as'=>'news', 'uses'=>'WebsiteController@news']);
Route::get('/about-us', ['as'=>'about_us', 'uses'=>'WebsiteController@about_us']);
Route::get('/contacts', ['as'=>'contacts', 'uses'=>'WebsiteController@contacts']);

