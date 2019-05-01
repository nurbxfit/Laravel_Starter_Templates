<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Auth::routes(); //default
Auth::routes(['verify' => true]); //emailverification 

Route::get('/home', 'HomeController@index')->name('user.dashboard');
Route::get('/info',function(){
    phpinfo();
});



Route::prefix('admin')->group(
    function(){
        //get 
        Route::get('login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::get('home','AdminController@index')->name('admin.dashboard');

        
        //post
        Route::post('login','Auth\AdminLoginController@login')->name('admin.login.submit');

    }
);
