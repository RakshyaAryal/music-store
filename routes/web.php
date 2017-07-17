<?php



Route::get('/','HomeController@index');
Route::get('/single-music/{id}', 'HomeController@singleMusic');
Route::get('/music/search', 'HomeController@search');
Route::get('genere/{genere}/{id}', 'HomeController@generesWiseView');


Route::get('generes/ajax-practice',function (){
    return view("ajax-practice.index");

});

Route::get('chat/index',function (){
    return view("chat.index");
});

Route::get('chat/index', 'ChatController@index');
Route::get('chat/store', 'ChatController@store');
Route::get('chat/list-all', 'ChatController@listAll');







Route::get('generes/get-details', 'Admin\GeneresController@getDetails');



Route::get('generes/search', 'Admin\GeneresController@searchForm');
Route::get('generes/ajax-search', 'Admin\GeneresController@ajaxSearch');



Auth::routes();



Route::group(['middleware' => 'auth'], function () {

    Route::post('admin/music/store','Admin\MusicController@store');
    Route::get('admin/music','Admin\MusicController@index');
    Route::get('admin/music/create','Admin\MusicController@create');
    Route::get('admin/music/{id}/edit','Admin\MusicController@edit');
    Route::post('admin/music/{id}/update','Admin\MusicController@update');
    Route::get('admin/music/{id}/view','Admin\MusicController@view');
    Route::get('admin/music/{id}/delete','Admin\MusicController@delete');
    Route::post('admin/music/store/{id}','Admin\MusicController@update');

    Route::post('admin/generes/store','Admin\GeneresController@store');
    Route::get('admin/generes','Admin\GeneresController@index');
    Route::get('admin/generes/create','Admin\GeneresController@create');
    Route::get('admin/generes/{id}/edit','Admin\GeneresController@edit');
    Route::post('admin/generes/{id}/update','Admin\GeneresController@update');
    Route::get('admin/generes/{id}/view','Admin\GeneresController@view');
    Route::get('admin/generes/{id}/delete','Admin\GeneresController@delete');
    Route::post('admin/generes/store/{id}','Admin\GeneresController@update');

});

