<?php


// Website
Route::get('/', ['as'=>'home', 'uses'=>'WebsiteController@home']);
Route::get('/our-causes', ['as'=>'our_causes', 'uses'=>'WebsiteController@our_causes']);
Route::get('/news', ['as'=>'news', 'uses'=>'WebsiteController@news']);
Route::get('/events', ['as'=>'events', 'uses'=>'WebsiteController@events']);
Route::get('/about-us', ['as'=>'about_us', 'uses'=>'WebsiteController@about_us']);
Route::get('/contacts', ['as'=>'contacts', 'uses'=>'WebsiteController@contacts']);

// Dashboard
Route::group(['prefix'=>'dashboard'], function(){
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', ['as' => 'login', 'uses' => 'DashboardController@login']);
        Route::post('login', ['as' => 'attempt_login', 'uses' => 'DashboardController@attemptLogin']);
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/logout', ['as' => 'logout', 'uses' => 'DashboardController@logout']);
        Route::get('/', ['as'=>'dashboard', 'uses'=>'DashboardController@dashboard']);
        Route::resource('mission', 'MissionController');
        Route::resource('our-causes', 'OurCauseController');
        Route::resource('news', 'NewsController');
    });
});
