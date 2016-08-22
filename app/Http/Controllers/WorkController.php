<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller; 
use App\Work;
use App\Review;
use App\Photo;
use App\Stuff;

class WorkController extends Controller {

	public function allWorks() {
		return view('works', ['works' => Work::all()]);
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

		return view('project', 
			['project' => $work, 'images' => $images, 'reviews' => $reviews,
			 'main_stuff' => $main_stuff, 'other_stuff' => $other_stuff]);
	}
}

?>