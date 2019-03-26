<?php

use Illuminate\Http\Request;

Route::get('posts', 'Api\PostsController@index')->name('api.posts.index');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
