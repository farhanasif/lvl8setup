<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','AdminAuthController@showLoginForm');
Route::any('/admin/logout','AdminAuthController@logout')->name('admin.logout');
Route::post('/admin/login','AdminAuthController@login')->name('admin.login');

/*-----user registration route-----*/
Route::get('/user/registration','Auth\RegisterController@ShowRegisterForm')->name('register');
Route::post('/user-register', 'Auth\RegisterController@HandleRegister')->name('user.register');
Route::get('/verify/{token}', 'VerifyController@VerifyEmail')->name('verify');

//forgot password
Route::get('/forgot/password','Auth\ForgotPasswordController@showLinkRequestForm')->name('forgot-password');
//sendResetLinkEmail ai method ta ase trait a ForgotPasswordController er mordhee
Route::post('/send/reset/link','Auth\ForgotPasswordController@submitForgetPasswordForm')
    ->name('forget.password.post');
Route::get('/reset-password/{token}','Auth\ForgotPasswordController@showResetPasswordForm')
    ->name('reset.password.get');
Route::post('/reset-password','Auth\ForgotPasswordController@submitResetPasswordForm')
    ->name('reset.password.post');

Route::middleware('admin')->group(function(){
    Route::get('/dashboard','HomeController@index')->name('dashboard');
    Route::get('/total/register-user','HomeController@showRegisterUser')->name('all.register.user');
});

Route::middleware('other')->group(function(){
    Route::get('/user/dashboard','HomeController@otherDashboard')->name('dashbords');
});   
