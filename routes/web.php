<?php
Route::auth();
//CMS route
Route::group(['middleware' => ['auth'], 'namespace' => 'CMS'], function () {
    Route::get('home', ['as' => 'homes.index', 'uses' => 'HomeController@index']);

    Route::get('/', ['as' => 'homes.index', 'uses' => 'HomeController@index']);
    Route::group(['middleware' => ['CheckAdmin']], function () {
        //Group
        Route::get('groups/getdata', ['as' => 'groups.data', 'uses' => 'GroupsController@getData']);
        Route::get('groups', ['as' => 'groups.index', 'uses' => 'GroupsController@index']);
        Route::get('groups/create', ['as' => 'groups.create', 'uses' => 'GroupsController@create']);
        Route::post('groups/store', ['as' => 'groups.store', 'uses' => 'GroupsController@store']);
        Route::delete('groups/{id}', ['as' => 'groups.destroy', 'uses' => 'GroupsController@destroy']);

        //User
        Route::get('users/getdata', ['as' => 'users.data', 'uses' => 'UsersController@getData']);
        Route::get('users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
        Route::get('users/create', ['as' => 'users.create', 'uses' => 'UsersController@createUser']);
        Route::post('users/store', ['as' => 'users.store', 'uses' => 'UsersController@store']);
        Route::get('users/{id}/show', ['as' => 'users.show', 'uses' => 'UsersController@show']);
        Route::get('users/logout', ['as' => 'users.logout', 'uses' => 'UsersController@logout']);
        Route::get('users/{id}/edit', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
        Route::put('users/{id}', ['as' => 'users.update', 'uses' => 'UsersController@update']);
        Route::delete('users/{id}', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);
    });
    //News
    Route::get('news/getdata', ['as' => 'news.data', 'uses' => 'NewsController@getData']);
    Route::get('news', ['as' => 'news.index', 'uses' => 'NewsController@index']);
    Route::get('news/create', ['as' => 'news.create', 'uses' => 'NewsController@create']);
    Route::post('news/store', ['as' => 'news.store', 'uses' => 'NewsController@store']);
    Route::get('news/{id}/show', ['as' => 'news.show', 'uses' => 'NewsController@show']);
    Route::get('news/{id}/edit', ['as' => 'news.edit', 'uses' => 'NewsController@edit']);
    Route::put('news/{id}', ['as' => 'news.update', 'uses' => 'NewsController@update']);
    Route::delete('news/{id}', ['as' => 'news.destroy', 'uses' => 'NewsController@destroy']);
});

