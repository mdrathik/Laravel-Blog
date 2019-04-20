<?php

Route::get('/', 'FrontendController@index')->name('homePage');

Route::prefix('blog')->group(function () {
    Route::get('/', 'FrontendController@blogPage')->name('blogPage');
    Route::get('/{slug}', 'FrontendController@SinglePost')->name('singlePost');
});


Route::get('test', function () {
    $article = App\Post::first();
    return $article->comment_count;
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'posts'], function () {
    Route::get('/create', function () {
        return view('welcome');
    })->name('create_post')
        ->middleware('can:create-post');
});

Route::get('/data', function () {
    return 'got it';
})->name('data')
    ->middleware('can:data');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



