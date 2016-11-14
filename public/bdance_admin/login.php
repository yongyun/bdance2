<?php
$su_agent = $_SERVER['HTTP_USER_AGENT'];
$su_ip = ft($_SERVER['REMOTE_ADDR'],1);
$su_tk = ft($_COOKIE['su_tk'],1);
$su_tk_key = ft($_COOKIE['su_tk_key'],1);
$submit	= ft($_POST['submit'],1);


$crypt_cookie = new phpcrypt();
$su_ok = 0;
//已經登入狀態
if(isset($su_tk))
{
	//解密
	$su_tk_d = explode(',',$crypt_cookie->dencrypt($su_tk));
	$su_id_d = $su_tk_d[0];
	$su_name_d = base64_decode($su_tk_d[1]);
	$su_ip_d = $su_tk_d[2];
	$su_state = $su_tk_d[3];
	$su_time_d = $su_tk_d[4];
	$su_commsalt_d = $su_tk_d[5];
	$su_aid_d = $su_tk_d[7];

	//比對簽章
	if($su_tk_key == eliteEncrypt($su_tk,getenv('REMOTE_ADDR')))
	{
		if($su_time_d - time() > 0 && $su_commsalt_d == getenv('REMOTE_ADDR'))
		{
			define('SU_AID_D',1);
			//使用者名稱
			define('SU_NAME_D',$su_name_d);
			//使用者流水號
			define('SU_ID_D',$su_id_d);

			//檢查所有define變數是否成功
			if(SU_SUCID_D != '' && SU_ID_D != '')
			{
				//取得帳號詳細資訊
				$mem_info = db_get_users_my_data($db,$su_id_d);

				$su_ok = 1;
				setcookie('su_tk',$su_tk,time() + 28800);
				setcookie('su_tk_key',$su_tk_key,time() + 28800);
			}
			else
			{
				post_back('請重新登入~');
				exit();
			}
		}
	}
}

//未登入狀態
if($su_ok == 0)
{
	//判斷有無表單送出
	if (isset($submit))
	{
		$user_name = ft(trim($_POST['user_name']),1);
		$user_passwd = ft(trim($_POST['user_passwd']),1);
		/*
		$check_code = ft(trim($_POST['check_code']),1);
		$letters_code = ft($_SESSION['6_letters_code'],1);

		if(empty($letters_code) || strcasecmp($letters_code, $check_code) != 0)
		{
			post_back('您輸入的驗證碼有誤，請重新輸入!');
			exit();
		}
		*/

		//確認帳號密碼有無填寫
		if (!empty($user_name) && !empty($user_passwd))
		{
			//密碼(加密)
			$user_pd = ft(trim(eliteEncrypt($user_passwd,$user_name)),1);

			//檢查帳號密碼正確
			$arr_input['m_user'] = $user_name;
			$arr_input['m_password'] = $user_pd;
			$result = db_get_users_check($db,$arr_input);
			unset($arr_input);

			//帳號密碼存在
			if(count($result) == 1)
			{
				foreach($result as $key => $row)
				{
					$m_id = $row['id'];
					$m_user = base64_encode($row['name']);
					$m_user_o = $row['name'];
					$m_name = $row['name'];
					$m_datetime = $row['created_at'];

					$su_tk = $m_id.','.$m_user.','.$su_ip.','.$su_state.','.(time()+86400).','.getenv('REMOTE_ADDR').','.rand();

					//加密
					$su_tk_main = $crypt_cookie->encrypt($su_tk);

					//多做一簽章
					$su_tk_key = eliteEncrypt($su_tk_main,getenv('REMOTE_ADDR'));

					//放入cookie
					setcookie('su_tk',$su_tk_main,time() + 28800);
					setcookie('su_tk_key',$su_tk_key,time() + 28800);

					//更新token
					$arr_input['remember_token'] = $su_tk_key;
					$arr_input['update_at'] = date('Y-m-d H:i:s');
					db_mod_users($db,$arr_input,$m_id);
					
					//登入成功，轉換頁面
					redirect_js_href('登入成功 '.$m_name.' 歡迎您登入','index.php');
					exit();
				}
			}
			else
			{
				post_back('登入失敗，帳號密碼有誤');
				exit();
			}

		}
		else
		{
			post_back('登入失敗，請填寫帳號及密碼');
			exit();
		}
	}
	//未登入狀態，顯示登入畫面
	else
	{
		//引入登入畫面
		include_once 'login_template.php';
		exit();
	}
}
?>
