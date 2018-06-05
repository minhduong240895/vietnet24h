<?php
Route::auth();
//CMS route
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => 'CMS'], function () {
    Route::get('home', ['as' => 'admin.index', 'uses' => 'AdminController@index']);

    Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@index']);

    Route::get('users/logout', ['as' => 'users.logout', 'uses' => 'UsersController@logout']);

    Route::get('users/{id}/edit', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
    Route::put('users/{id}', ['as' => 'users.update', 'uses' => 'UsersController@update']);
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
        Route::delete('users/{id}', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);

        //Types
        Route::get('types/getdata', ['as' => 'types.data', 'uses' => 'TypesController@getData']);
        Route::get('types', ['as' => 'types.index', 'uses' => 'TypesController@index']);
        Route::get('types/create', ['as' => 'types.create', 'uses' => 'TypesController@create']);
        Route::post('types/store', ['as' => 'types.store', 'uses' => 'TypesController@store']);
        Route::get('types/{id}/show', ['as' => 'types.show', 'uses' => 'TypesController@show']);
        Route::get('types/{id}/edit', ['as' => 'types.edit', 'uses' => 'TypesController@edit']);
        Route::put('types/{id}', ['as' => 'types.update', 'uses' => 'TypesController@update']);
        Route::delete('types/{id}', ['as' => 'types.destroy', 'uses' => 'TypesController@destroy']);

        //Comments
        Route::get('comments/getdata', ['as' => 'comments.data', 'uses' => 'CommentsController@getData']);
        Route::get('comments', ['as' => 'comments.index', 'uses' => 'CommentsController@index']);
        Route::get('comments/{id}/{value}/changestatus', ['as' => 'comments.changestatus', 'uses' => 'CommentsController@changestatus']);
        Route::post('comments/store', ['as' => 'comments.store', 'uses' => 'CommentsController@store']);
        Route::get('comments/{id}/show', ['as' => 'comments.show', 'uses' => 'CommentsController@show']);
        Route::get('comments/{id}/edit', ['as' => 'comments.edit', 'uses' => 'CommentsController@edit']);
        Route::put('comments/{id}', ['as' => 'comments.update', 'uses' => 'CommentsController@update']);
        Route::delete('comments/{id}', ['as' => 'comments.destroy', 'uses' => 'CommentsController@destroy']);

        //Tags
        Route::get('tags/getdata', ['as' => 'tags.data', 'uses' => 'TagsController@getData']);
        Route::get('tags', ['as' => 'tags.index', 'uses' => 'TagsController@index']);
        Route::post('tags/getnews', ['as' => 'tags.getnews', 'uses' => 'TagsController@getListNews']);
        Route::get('tags/create', ['as' => 'tags.create', 'uses' => 'TagsController@create']);
        Route::post('tags/store', ['as' => 'tags.store', 'uses' => 'TagsController@store']);
        Route::get('tags/{id}/show', ['as' => 'tags.show', 'uses' => 'TagsController@show']);
        Route::get('tags/{id}/edit', ['as' => 'tags.edit', 'uses' => 'TagsController@edit']);
        Route::put('tags/{id}', ['as' => 'tags.update', 'uses' => 'TagsController@update']);
        Route::delete('tags/{id}', ['as' => 'tags.destroy', 'uses' => 'TagsController@destroy']);

        //Categories
        Route::get('categories/getdata', ['as' => 'categories.data', 'uses' => 'CategoriesController@getData']);
        Route::get('categories', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
        Route::post('categories/gettopics', ['as' => 'categories.gettopics', 'uses' => 'CategoriesController@getListTopic']);
        Route::get('categories/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
        Route::post('categories/store', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
        Route::get('categories/{id}/show', ['as' => 'categories.show', 'uses' => 'CategoriesController@show']);
        Route::get('categories/{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
        Route::put('categories/{id}', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
        Route::delete('categories/{id}', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);

        //Statistic

        Route::get('statistic/gettopic', ['as' => 'statistic.gettopic', 'uses' => 'TopicsController@getstatistic']);
        Route::get('statistic/listtopic', ['as' => 'statistic.listtopic', 'uses' => 'TopicsController@listTopic']);
        Route::get('statistic/{id}/topicdata', ['as' => 'statistic.topicdata', 'uses' => 'NewsController@getDataTopicStatistic']);
        Route::get('statistic/{id}/topic', ['as' => 'statistic.topic', 'uses' => 'TopicsController@statistic']);

        Route::get('statistic/getuser', ['as' => 'statistic.getuser', 'uses' => 'UsersController@getstatistic']);
        Route::get('statistic/listuser', ['as' => 'statistic.listuser', 'uses' => 'UsersController@listUser']);
        Route::get('statistic/{id}/userdata', ['as' => 'statistic.userdata', 'uses' => 'NewsController@getDataUserStatistic']);
        Route::get('statistic/{id}/user', ['as' => 'statistic.user', 'uses' => 'UsersController@statistic']);


        //Topics

        Route::get('topics/getstatistic', ['as' => 'topics.getstatistic', 'uses' => 'TopicsController@getstatistic']);
        Route::get('topics/list', ['as' => 'topics.list', 'uses' => 'TopicsController@listTopic']);
        Route::get('topics/{id}/statistic', ['as' => 'topics.statistic', 'uses' => 'TopicsController@statistic']);

        Route::get('topics/getdata', ['as' => 'topics.data', 'uses' => 'TopicsController@getData']);
        Route::get('topics', ['as' => 'topics.index', 'uses' => 'TopicsController@index']);
        Route::get('topics/create', ['as' => 'topics.create', 'uses' => 'TopicsController@create']);
        Route::post('topics/store', ['as' => 'topics.store', 'uses' => 'TopicsController@store']);
        Route::get('topics/{id}/show', ['as' => 'topics.show', 'uses' => 'TopicsController@show']);
        Route::get('topics/{id}/edit', ['as' => 'topics.edit', 'uses' => 'TopicsController@edit']);
        Route::put('topics/{id}', ['as' => 'topics.update', 'uses' => 'TopicsController@update']);
        Route::delete('topics/{id}', ['as' => 'topics.destroy', 'uses' => 'TopicsController@destroy']);

        //Options
        Route::get('options/getdata', ['as' => 'options.data', 'uses' => 'OptionsController@getData']);
        Route::get('options', ['as' => 'options.index', 'uses' => 'OptionsController@index']);
        Route::get('options/create', ['as' => 'options.create', 'uses' => 'OptionsController@create']);
        Route::post('options/store', ['as' => 'options.store', 'uses' => 'OptionsController@store']);
        Route::get('options/{id}/show', ['as' => 'options.show', 'uses' => 'OptionsController@show']);
        Route::get('options/{id}/edit', ['as' => 'options.edit', 'uses' => 'OptionsController@edit']);
        Route::put('options/{id}', ['as' => 'options.update', 'uses' => 'OptionsController@update']);
        Route::delete('options/{id}', ['as' => 'options.destroy', 'uses' => 'OptionsController@destroy']);

        //Banners
        Route::get('banners/getdata', ['as' => 'banners.data', 'uses' => 'BannersController@getData']);
        Route::get('banners', ['as' => 'banners.index', 'uses' => 'BannersController@index']);
        Route::get('banners/create', ['as' => 'banners.create', 'uses' => 'BannersController@create']);
        Route::post('banners/store', ['as' => 'banners.store', 'uses' => 'BannersController@store']);
        Route::get('banners/{id}/show', ['as' => 'banners.show', 'uses' => 'BannersController@show']);
        Route::get('banners/{id}/edit', ['as' => 'banners.edit', 'uses' => 'BannersController@edit']);
        Route::put('banners/{id}', ['as' => 'banners.update', 'uses' => 'BannersController@update']);
        Route::delete('banners/{id}', ['as' => 'banners.destroy', 'uses' => 'BannersController@destroy']);
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
Route::group(['namespace' => 'THEME'], function () {
    // Font end route
    Route::get('/', ['as' => 'homes.index', 'uses' => 'HomeController@index']);
    Route::get('danh-muc/{slug}', 'HomeController@category');
    Route::get('chuyen-muc/{slug}', 'HomeController@topic');
    Route::get('/tin-tuc/{slug}.html', 'HomeController@news');
    Route::get('/tin-tuc/{slug}.html', ['as' => 'tin-tuc.detail', 'uses' => 'HomeController@news']);
    Route::post('post-comment', 'HomeController@news');
    Route::post('post-comment', ['as' => 'post.comment', 'uses' => 'HomeController@saveComment']);
    Route::post('getmorecmt', ['as' => 'homes.getmorecmt', 'uses' => 'HomeController@getMoreComment']);
});

