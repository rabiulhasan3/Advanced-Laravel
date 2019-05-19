<?php

use App\Jobs\SendMailJob;
use carbon\carbon;
use App\Events\TaskEvent;
use App\Events\PusherEvent;
use App\Notifications\TaskCompleateNotification;
use App\Notifications\databaseNotification;
use App\User;

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
			
	dispatch($job);
	return 'successfully send';
});

Route::get('event',function(){
	event(new TaskEvent('Hey How are you ? Man !!'));
});


Route::get('chat','pusherController@chat');
Route::get('send','pusherController@send');

Route::get('subs',function(){
	if (Gate::allows('subs-only', Auth::user())) {
    	return view('subscriber');
	}else{
		echo 'you are not subscriber. <a href="">please subscribe</a>';
	}
	
});



Route::get('send-notification',function(){
	//User::find(1)->notify(new TaskCompleateNotification);
	$users = User::find(1);
	Notification::send($users, new TaskCompleateNotification());
});


Route::get('queue-notification',function(){
	$when = now()->addSeconds(10);
	$user = User::find(1);
	$user->notify((new TaskCompleateNotification)->delay($when));
});


Route::get('format-mail-notification',function(){

	$user = User::find(1);
	Notification::route('mail', 'admin@example.com')
            ->route('nexmo', '5555555555')
            ->notify(new TaskCompleateNotification($user));
});

Route::get('database-notification',function(){

	$user = User::find(1);
	$user->notify(new databaseNotification);
});