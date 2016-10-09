<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller; 


class NewsController extends Controller {

	public function allNews() {
		return view('news_list');
	}

	public function showNews($id) {

		return view('news');
	}
}

?>