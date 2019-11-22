<?php
Route::get('/',function (){
    return view('sample_feed');
});

Route::resource('sample', 'FeedController');

Route::post('sample/update', 'FeedController@update')->name('sample.update');

Route::get('sample/destroy/{id}', 'FeedController@destroy');
