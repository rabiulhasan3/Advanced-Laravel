<?php

use App\Jobs\SendMailJob;
use carbon\carbon;
use App\Events\TaskEvent;
use App\Events\PusherEvent;

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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Form Validation
Route::get('form','validation\FormValidationController@index')->name('form');
Route::post('store','validation\FormValidationController@store')->name('form.store');

Route::get('/lang/{lang?}',function($lang=null){
	 App::setLocale($lang);
	 return view('lang');
});


Route::get('sendmail',function(){
	$job = (new SendMailJob())
			->delay(Carbon::now()->addSeconds(5));
			dd($job);
	dispatch($job);
	return 'successfully send';
});

Route::get('event',function(){
	event(new TaskEvent('Hey How are you ? Man !!'));
});


Route::get('chat','pusherController@chat');
Route::get('send','pusherController@send');