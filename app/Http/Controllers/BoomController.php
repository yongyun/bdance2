<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller; 


class BoomController extends Controller {

	public function allBooms() {
		return view('boom');
	}

	public function showBoom($id) {

		return view('bpost');
	}
}

?>