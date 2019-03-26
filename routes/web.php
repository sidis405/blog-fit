<?php

Route::get('/', 'PostsController@index')->name('posts.index');
Route::resource('posts', 'PostsController')->except('index');

Route::get('category/{category}', 'CategoriesController@show')->name('categories.show');
Route::get('tags/{tag}', 'TagsController@show')->name('tags.show');

// Route::get('posts/{post}', 'PostsController@show')->name('posts.show');

// REST W3C
// GET POST PUT|PATCH DELETE - OPTIONS

// GET - /posts - listare tutti i post - PostsController@index - posts.index
// GET- /posts/{post} - visionare singolo post - PostsController@show - posts.show
// GET - /posts/create - form creazione post - PostsController@create - posts.create
// POST - /posts - salvataggio nuovo post - PostsController@store - posts.store
// GET - /posts/{post}/edit - form aggiornamento post esistente - PostsController@edit - posts.edit
// PATCH - /posts/{post} aggiornamento post - PostsController@update - posts.update
// DELETE - /posts/{post} - cancellazione post - PostsController@destroy - posts.destroy



Auth::routes();
