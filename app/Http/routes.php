<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Input;
use Jenssegers\Agent\Agent;


Route::get('/', function () {
	$agent = new Agent();

    return view('index', ['isMobile' => $agent->isMobile()]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/sendMail', function() {

	$name = Input::get('name');

	$email = Input::get('email');
	$messages = Input::get('message');
	$mess = $name + " say: " + $messages;
	$subject = "[BDance] " + $name+ " send you a message";
	$data = array('name'=> $name, 'email'=> $email, 
		'subject'=> $subject, 'message'=> $mess);

	Mail::raw($messages, function($message) use ($data)
		{

		    $message->to($data['email'])->subject('You got a Message!');
		});
	return redirect('/');
});


Route::get('/works', 'WorkController@allWorks');
Route::get('/works/{id}', 'WorkController@showWork');
Route::get('/boom', 'BoomController@allBooms');
Route::get('/boom/{id}', 'BoomController@showBoom');