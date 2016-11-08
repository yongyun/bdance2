<?php
require_once('inc/inc.php');
require_once('func/func_user_sys_add_mod_act.php');

$act = ft($_POST['act'],1);
if($act == '')
{
	$act = ft($_GET['act'],1);
}
$id = ft(trim($_POST['id']),0);
if($id == '')
{
	$id = ft(trim($_GET['id']),0);
}
$mod_pd = ft(trim($_POST['mod_pd']),0);
$new_account = ft(trim($_POST['new_account']),1);
$old_password = ft(trim($_POST['old_password']),1);
$new_password = ft(trim($_POST['new_password']),1);
$new_password_check = ft(trim($_POST['new_password_check']),1);
$name = ft(trim($_POST['name']),1);
$email = ft(trim($_POST['email']),1);
$type = ft(trim($_POST['type']),0);

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
		if($name == '')
		{
			post_back('請輸入暱稱');
			exit();
		}
		if($email == '')
		{
			post_back('請輸入信箱');
			exit();
		}
		if($type == '')
		{
			post_back('請選擇身份');
			exit();
		}
		
		//檢查帳號是否重複
		$arr_input['m_user'] = $new_account;
		$result = db_get_member_check($db,$arr_input);
		unset($arr_input);

		if(count($result) == 1)
		{
			post_back('帳號重複');
			exit();
		}

		//密碼(加密)
		$user_pd = ft(trim(eliteEncrypt($new_password,$new_account)),1);

		//建立新帳號
		$arr_input['m_user'] = $new_account;
		$arr_input['m_password'] = $user_pd;
		$arr_input['m_name'] = $name;
		$arr_input['m_email'] = $email;
		$arr_input['m_type'] = $type;
		$arr_input['m_datetime'] = date('Y-m-d H:i:s');

		$res = db_add_member($db,$arr_input);
		unset($arr_input);

		//操作記錄
		$arr_input['sy_ip'] = $su_ip;
		$arr_input['sy_uid'] = $mem_info['m_id'];
		$arr_input['sy_info'] = 'member_add';
		$arr_input['sy_modify_id'] = $res;
		$arr_input['sy_browser'] = $su_agent;
		$arr_input['sy_date'] = date('Y-m-d H:i:s');
		db_add_system_log($db,$arr_input);
		unset($arr_input);
		
		reload_js_top('新增成功');
		exit();
	break;
	
	case 'mod':
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}

		//帳號資料
		$res_mem = db_get_member($db,$id);
	
		if($mod_pd == 'mod_pd' && $old_password != '')
		{
			//舊密碼(加密)
			$user_pd = ft(trim(eliteEncrypt($old_password,$res_mem['m_user'])),1);
			
			if($user_pd != $res_mem['m_password'])
			{
				post_back('原密碼錯誤');
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
			$user_pd = ft(trim(eliteEncrypt($new_password,$new_account)),1);
		}
	
		if($name == '')
		{
			post_back('請輸入暱稱');
			exit();
		}
		if($email == '')
		{
			post_back('請輸入信箱');
			exit();
		}
		if($type == '')
		{
			post_back('請選擇身份');
			exit();
		}

		if($old_password != '')
		{
			$arr_input['m_password'] = $user_pd;
		}
		$arr_input['m_name'] = $name;
		$arr_input['m_email'] = $email;
		$arr_input['m_type'] = $type;
		$res = db_mod_member($db,$arr_input,$id);
		unset($arr_input);

		//操作記錄
		$arr_input['sy_ip'] = $su_ip;
		$arr_input['sy_uid'] = $mem_info['m_id'];
		$arr_input['sy_info'] = 'member_updata';
		$arr_input['sy_modify_id'] = $id;
		$arr_input['sy_browser'] = $su_agent;
		$arr_input['sy_date'] = date('Y-m-d H:i:s');
		db_add_system_log($db,$arr_input);
		unset($arr_input);
		
		reload_js_top('修改成功');
		exit();
	break;
	
	case 'del':
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}

		$arr_input['m_del'] = 1;
		$res = db_mod_member($db,$arr_input,$id);
		unset($arr_input);

		//操作記錄
		$arr_input['sy_ip'] = $su_ip;
		$arr_input['sy_uid'] = $mem_info['m_id'];
		$arr_input['sy_info'] = 'member_del';
		$arr_input['sy_modify_id'] = $id;
		$arr_input['sy_browser'] = $su_agent;
		$arr_input['sy_date'] = date('Y-m-d H:i:s');
		db_add_system_log($db,$arr_input);
		unset($arr_input);
		
		redirect_js_href('修改成功','user_sys.php');
		exit();

	break;

	default:
		post_back('參數錯誤');
		exit();
	break;
}
?>