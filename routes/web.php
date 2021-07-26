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

Route::middleware('admin')->group(function(){
    Route::get('/dashboard','HomeController@index')->name('dashboard');
});

Route::middleware('other')->group(function(){
    Route::get('/user/dashboard','HomeController@otherDashboard')->name('dashbords');
});   
