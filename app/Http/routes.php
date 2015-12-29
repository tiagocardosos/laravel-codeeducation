<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


use Illuminate\Support\Facades\Response;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token', function () {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => 'oauth'], function () {

    Route::resource('client', 'ClientController', ['except' => 'create', 'edit']);
//    Route::get('client', ['middleware' => 'oauth', 'uses'=>'ClientController@index']);
//    Route::post('client', 'ClientController@store');
//    Route::get('client/{id}', 'ClientController@show');
//    Route::put('client/{id}', 'ClientController@update');
//    Route::delete('client/{id}', 'ClientController@destroy');


//    Route::group(['middleware' => 'CheckProjectOwner'], function () {
//
//        Route::resource('project', 'ProjectController', ['except' => 'create', 'edit']);
//    });

    Route::resource('project', 'ProjectController', ['except' => 'create', 'edit']);

    Route::group(['prefix' => 'project'], function () {

        Route::get('{id}/note', 'ProjectNoteController@index');
        Route::post('{id}/note', 'ProjectNoteController@store');
        Route::get('{id}/note/{noteId}', 'ProjectNoteController@show');
        Route::put('{id}/note/{noteId}', 'ProjectNoteController@update');
        Route::delete('{id}/note/{noteId}', 'ProjectNoteController@destroy');

        Route::get('{id}/task', 'ProjectTaskController@index');
        Route::post('{id}/task', 'ProjectTaskController@store');
        Route::get('{id}/task/{taskId}', 'ProjectTaskController@show');
        Route::put('{id}/task/{taskId}', 'ProjectTaskController@update');
        Route::delete('{id}/task/{taskId}', 'ProjectTaskController@destroy');

        Route::get('{id}/members', 'ProjectMemberController@index');
        Route::post('{id}/member', 'ProjectMemberController@store');
        Route::get('{id}/member/{memberId}', 'ProjectMemberController@show');
        Route::delete('{id}/member/{memberId}', 'ProjectMemberController@destroy');

        Route::post('{id}/file', 'ProjectFileController@store');

//        Route::get('project', 'ProjectController@index');
//        Route::post('project', 'ProjectController@store');
//        Route::get('project/{id}', 'ProjectController@show');
//        Route::put('project/{id}', 'ProjectController@update');
//        Route::delete('project/{id}', 'ProjectController@destroy');

    });

});



