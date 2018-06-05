<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', [
    'namespace'  => 'App\Http\Controllers\API',
    'prefix'     => 'api',
], function ($api) {

    $api->post('members/register', ['as' => 'members.register', 'uses' => 'MembersController@register']);
    $api->post('members/login', ['as' => 'members.login', 'uses' => 'MembersController@login']);
    $api->put('members/verify', ['as' => 'members.verify', 'uses' => 'MembersController@verify']);
    $api->put('/members/resetpassword', ['as' => 'members.resetpassword', 'uses' => 'MembersController@resetPassword']);
    $api->group(['middleware' => 'CheckAccessToken'], function ($api) {
        $api->get('members/info', ['as' => 'members.info', 'uses' => 'MembersController@show']);
        $api->post('members/update', ['as' => 'members.update', 'uses' => 'MembersController@update']);
        $api->put('members/changepassword', ['as' => 'members.changpass', 'uses' => 'MembersController@changePass']);
        //News
        $api->get('news', 'NewsController@list');
    });

});