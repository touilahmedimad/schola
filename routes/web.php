<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function (){
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'teacher'], function () {
  Route::get('/login', 'TeacherAuth\LoginController@showLoginForm');
  Route::post('/login', 'TeacherAuth\LoginController@login');
  Route::post('/logout', 'TeacherAuth\LoginController@logout');

  Route::get('/register', 'TeacherAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'TeacherAuth\RegisterController@register');

  Route::post('/password/email', 'TeacherAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'TeacherAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'TeacherAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'TeacherAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'student'], function () {
  Route::get('/login', 'StudentAuth\LoginController@showLoginForm');
  Route::post('/login', 'StudentAuth\LoginController@login');
  Route::post('/logout', 'StudentAuth\LoginController@logout');

  Route::get('/register', 'StudentAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'StudentAuth\RegisterController@register');

  Route::post('/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'StudentAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');
});
