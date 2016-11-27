<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller; 
use App\boom_info;
use App\boom_ad;
use App\boom_list;
use App\boom_user;


class BoomController extends Controller 
{

	public function allBooms() 
	{
		$boom_info = boom_info::where([
				['bi_id','=','1']
			])
			->get();
		$boom_list = boom_list::where([
				['bl_del','=','0']
			])->orderBy('bl_title','desc')
			->get();
		$boom_buy = boom_list::where([
				['bl_del','=','0']
			])->orderBy('bl_title','desc')->limit(1)
			->get();
		return view('boom',['right_menu' => right_menu(),'boom_info' => $boom_info,'boom_list' => $boom_list,'boom_buy' => $boom_buy]);
	}

	public function showBoom($id) 
	{
		$boom_list = boom_list::where([
				['bl_id','=',$id]
			])
			->get();
		$boom_ad = boom_ad::where([
				['ba_work','=',$id]
			])
			->get();
		$boom_user = boom_user::where([
				['bu_work','=',$id]
			])
			->get();
		$boom_user_info = boom_user::where([
				['bu_work','=',$id]
			])
			->get();
		return view('bpost',['right_menu' => right_menu(),'boom_list' => $boom_list,'boom_ad' => $boom_ad,'boom_user' => $boom_user,'boom_user_info' => $boom_user_info]);
	}
}

?>