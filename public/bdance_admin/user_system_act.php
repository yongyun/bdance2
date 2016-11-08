<?php
require_once('inc/inc.php');
require_once('func/func_user_system_act.php');

$act = ft($_POST['act'],1);
$url = ft(trim($_POST['url']),1);
$new_account = ft(trim($_POST['new_account']),1);
$old_password = ft(trim($_POST['old_password']),1);
$new_password = ft(trim($_POST['new_password']),1);
$new_password_check = ft(trim($_POST['new_password_check']),1);
$email = ft(trim($_POST['email']),1);

$crypt_cookie = new phpcrypt();

switch($act)
{
	case 'add':
		if($new_account == '')
		{
			post_back('請輸入帳號');
			exit();
		}
		if($new_password == '')
		{
			post_back('請輸入密碼');
			exit();
		}
		if($new_password != $new_password_check)
		{
			post_back('密碼與密碼確認不一致');
			exit();
		}
		if($email == '')
		{
			post_back('請輸入信箱');
			exit();
		}
		
		//檢查帳號是否重複
		$arr_input['name'] = $new_account;
		$result = db_get_users_check($db,$arr_input);
		unset($arr_input);

		if(count($result) == 1)
		{
			post_back('帳號重複');
			exit();
		}

		//密碼(加密)
		$user_pd = ft(trim(eliteEncrypt($new_password,$new_account)),1);

		//建立新帳號
		$arr_input['name'] = $new_account;
		$arr_input['password'] = $user_pd;
		$arr_input['email'] = $email;
		$arr_input['updated_at'] = date('Y-m-d H:i:s');

		$res = db_add_users($db,$arr_input);
		unset($arr_input);
		
		if($url == '')
		{
			redirect_js_href('新增成功','add_new_member_sys.php');
		}
		else
		{
			redirect_js_href('新增成功',$url);
		}
		exit();
	break;
	
	case 'mod':
		if($old_password != '')
		{
			//舊密碼(加密)
			$user_pd = ft(trim(eliteEncrypt($old_password,$mem_info['name'])),1);
			
			if($user_pd != $mem_info['password'])
			{
				//post_back('原密碼錯誤');
				exit();
			}
			if($new_password == '')
			{
				post_back('請輸入密碼');
				exit();
			}
			if($new_password != $new_password_check)
			{
				post_back('密碼與密碼確認不一致');
				exit();
			}

			//新密碼(加密)
			$user_pd = ft(trim(eliteEncrypt($new_password,$mem_info['name'])),1);
		}
	
	
		if($email == '')
		{
			post_back('請輸入信箱');
			exit();
		}
		if($old_password != '')
		{
			$arr_input['password'] = $user_pd;
		}
		$arr_input['email'] = $email;
		$res = db_mod_users($db,$arr_input,$mem_info['id']);
		unset($arr_input);

		if($url == '')
		{
			redirect_js_href('修改成功','user_system.php?act=mod');
		}
		else
		{
			redirect_js_href('修改成功',$url);
		}
	break;
	
	default:
		post_back('參數錯誤');
		exit();
	break;
}
?>