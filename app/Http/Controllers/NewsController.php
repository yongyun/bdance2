<?php

namespace App\Http\Controllers;

use Request;
use App\User;
use App\Http\Controllers\Controller; 
use App\News;
use App\News_ad;
use App\News_video;


class NewsController extends Controller 
{

	public function allNews() {
		$news_list = News::where([
				['nw_del','=',0],
				['nw_status','=','0']
			])->orderBy('nw_id','desc')
			->paginate(20);

		return view('news_list', ['news_list' => $news_list,'right_menu' => right_menu()]);
	}

	public function showNews($id) {
		$news_list = News::where([
				['nw_del','=',0],
				['nw_id','=',$id]
			])->get();
			
		$news_ad = News_ad::where([
				['na_del','=',0],
				['na_nwid','=',$id]
			])->get();
		$news_video = news_video::where([
				['nv_del','=',0],
				['nv_nwid','=',$id]
			])->get();

		$news_pr = News::where([
				['nw_del','=',0],
			])->orderBy('nw_id','asc')->limit(1)->get();

		$news_nt = News::where([
				['nw_del','=',0],
			])->orderBy('nw_id','desc')->limit(1)->get();
		
		$news_next = News::where([
				['nw_del','=',0],
				['nw_id','>=',$id]
			])->orderBy('nw_id','asc')->limit(2)->get();
		
		return view('news', ['news_list' => $news_list,'news_ad' => $news_ad,'news_video' => $news_video,'news_pr' => $news_pr,'news_nt' => $news_nt,'news_next' => $news_next,'right_menu' => right_menu()]);
	}
}

?>