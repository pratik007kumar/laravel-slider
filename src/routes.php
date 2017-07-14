<?php
Route::group(['prefix' => config('slider.slider_route_prefix'),'middleware' => ['web', 'auth']], function(){

Route::get('/slider','Pratik\Slider\Controller\SliderController@index');
Route::get('/slider/view/{id}','Pratik\Slider\Controller\SliderController@show');
Route::get('/slider/delete/{id}','Pratik\Slider\Controller\SliderController@delete');
Route::get('/slider/preview/{id}','Pratik\Slider\Controller\SliderController@preview');

Route::get('/slider/create','Pratik\Slider\Controller\SliderController@create');

Route::get('elfinder/popup/{feature_image}', 'Barryvdh\Elfinder\ElfinderController@showPopup');
Route::post('/slider/store','Pratik\Slider\Controller\SliderController@store');

});