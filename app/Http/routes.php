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
use App\MailMessage;


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
	$subject = "[BDance] ". $name. " send you a message";
	$data = array('name'=> $name, 'email'=> $email, 
		'subject'=> $subject, 'messages'=> $messages);

	Mail::send('emails.contact', ['name'=> $name, 'email'=> $email, 
		'subject'=> $subject, 'messages'=> $messages], function($message) use ($data) {
		$message->from($data['email'], $data['name']);
		$message->to('bdanceweb@gmail.com')->subject($data['subject']);
	});

	$model = new MailMessage;
	$model->name = $name;
	$model->email = $email;
	$model->message = $messages;
	$model->created_at = date("Y-m-d H:i:s");
	$model->save();

	return redirect('/');
});


Route::get('/works', 'WorkController@allWorks');
Route::get('/works/{id}', 'WorkController@showWork');
Route::get('/boom', 'BoomController@allBooms');
Route::get('/boom/{id}', 'BoomController@showBoom');
Route::get('/news', 'NewsController@allNews');
Route::get('/news/{id}', 'NewsController@showNews');