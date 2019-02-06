<?php

//$namespace = 'Blogable\Http\Controllers\Frontend';

Route::group(['namespace'=>'Blogable\Http\Controllers\Frontend', 'prefix'=>"blog",'middleware'=>'web','as'=>'frontend.'],function()
{
    Route::get('/',['uses'=>'MainController@index','as'=>'index']);

    Route::get('/search',['uses'=>"SearchController@index",'as'=>'search']);

    Route::get('/{slug}',['uses'=>'PostController@index','as'=>'post']);

    Route::get('/category/{category}',['uses'=>'CategoryController@index','as'=>'category']);

    Route::get('/tags/{tag}',['uses'=>'TagsController@index','as'=>'tag']);
});


Route::group(['namespace'=>'Blogable\Http\Controllers\Backend', 'prefix'=>"blog/admin",'middleware'=>['web','auth'],'as'=>'backend.'],function()
{

    Route::resource('dashboard','DashboardController')->only(['index']);

    Route::resource('posts','PageController');

    Route::resource('category','CategoryController');

    Route::resource('menus','MenusController')->only(['index','show']);

    Route::resource('menus.items','MenuItemsController');

    Route::resource('options','OptionsController');
  // Route::resource('menus.items','MenusController');

    Route::get("login",["uses"=>"AuthController@login",'as'=>'auth.login','middleware'=>"guest"]);

    Route::post('logout',['uses'=>"AuthController@logout",'as'=>'auth.logout','middleware'=>'auth']);
});