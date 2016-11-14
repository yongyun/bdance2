<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller; 
use App\Work;
use App\Review;
use App\Photo;
use App\Award;
use App\Stuff;
use App\Tour;

class WorkController extends Controller {

	public function allWorks() {
		$work = Work::orderBy('created_at', 'desc')->get();
		return view('works', ['works' => $work]);
	}

	public function showWork($id) {
		$work = Work::findOrFail($id);
		$reviews = Review::where('work_id', $id)
					->get();

		$images = Photo::where('work_id', $id)
				 ->get();
		$main_stuff = Stuff::where([
				['work_id', '=' , $id],
				['type', '=' , 'primary']
			])->get();
		$other_stuff = Stuff::where([
				['work_id', '=' , $id],
				['type', '=' , 'secondary']
			])->get();
		$awards = Award::where('work_id', $id)->get();
		$tours = Tour::where('work_id', $id)->orderBy('order', 'asc')->get();

		return view('project', 
			['project' => $work, 'images' => $images, 'reviews' => $reviews,
			 'main_stuff' => $main_stuff, 'other_stuff' => $other_stuff,
			 'tours' => $tours, 'awards' => $awards]);
	}
}

?>