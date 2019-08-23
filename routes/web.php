<?php


// Website
Route::get('/', ['as'=>'home', 'uses'=>'WebsiteController@home']);
Route::get('/projects', ['as'=>'projects', 'uses'=>'WebsiteController@projects']);
Route::get('/news', ['as'=>'news', 'uses'=>'WebsiteController@news']);
Route::get('/events', ['as'=>'events', 'uses'=>'WebsiteController@events']);
Route::get('/event_detail', ['as'=>'event_detail', 'uses'=>'WebsiteController@event_detail']);
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
        Route::get('/change_activation', ['as'=>'change_activation', 'uses'=>'DashboardController@change_activation']);
        Route::get('/change_feature', ['as'=>'change_feature', 'uses'=>'DashboardController@change_feature']);
        Route::resource('mission', 'MissionController');
        Route::resource('project', 'ProjectController');
        Route::resource('news', 'NewsController');
        Route::resource('event', 'EventController');
    });
});
