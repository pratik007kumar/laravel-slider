<?php
Route::group(['middleware' => ['web', 'auth']], function(){
Route::get('/slider','Pratik\Slider\Controller\SliderController@index');
Route::get('/slider/view/{id}','Pratik\Slider\Controller\SliderController@show');

Route::get('/slider/create','Pratik\Slider\Controller\SliderController@create');

Route::get('elfinder/popup/{feature_image}', 'Barryvdh\Elfinder\ElfinderController@showPopup');
Route::post('/slider/store','Pratik\Slider\Controller\SliderController@store');

// Route::post('/calender/getfrm', 'Pratik\ToDoEventCalender\Controller\CalenderController@create');
// Route::post('/calender/save', 'Pratik\ToDoEventCalender\Controller\CalenderController@store');
// Route::post('/calender/delete', 'Pratik\ToDoEventCalender\Controller\CalenderController@delete');
// Route::post('/calender/resize', 'Pratik\ToDoEventCalender\Controller\CalenderController@resize');
// Route::get('/calender/getcalender', 'Pratik\ToDoEventCalender\Controller\CalenderController@getCalender');
});