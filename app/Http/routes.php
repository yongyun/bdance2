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
use App\index_view;
use App\menu_link;
use App\slogan;
use App\about_media;
use App\about_awards;

function right_menu()
{
	$fb_link = menu_link::where([
			['ml_id','=','1']
		])->get();
	$vimeo_link = menu_link::where([
			['ml_id','=','2']
		])->get();
	$axearts_link = menu_link::where([
			['ml_id','=','3']
		])->get();
		
	$url_link = array('fb_link' => $fb_link[0]['ml_link'] , 'vimeo_link' => $vimeo_link[0]['ml_link'] , 'axearts_link' => $axearts_link[0]['ml_link']);
	return $url_link;
}

Route::get('/', function () {
	// $agent = new Agent();

    // return view('index', ['isMobile' => $agent->isMobile()]);
	$video = index_view::where([
			['iv_type','=','0']
		])->orderBy('iv_id','desc')->get();
		
	$images = index_view::where([
			['iv_type','=','1']
		])->orderBy('iv_id','desc')->get();
	return view('index', ['video' => $video,'images' => $images,'right_menu' => right_menu()]);
});

Route::get('/about', function () {
	$slogan = slogan::where([
			['id','=','1']
		])->get();
		
	$about_media = about_media::orderBy('am_id','desc')->get();

	$about_awards = about_awards::orderBy('id','desc')->get();

	return view('about', ['right_menu' => right_menu(),'slogan' => $slogan , 'about_media' => $about_media , 'about_awards' => $about_awards]);
});

Route::get('/contact', function () {
    return view('contact', ['right_menu' => right_menu()]);
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

	return redirect('/', ['right_menu' => right_menu()]);
});


Route::get('/works', 'WorkController@allWorks');
Route::get('/works/{id}', 'WorkController@showWork');
Route::get('/boom', 'BoomController@allBooms');
Route::get('/boom/{id}', 'BoomController@showBoom');
Route::get('/news', 'NewsController@allNews');
Route::get('/news/{id}', 'NewsController@showNews');