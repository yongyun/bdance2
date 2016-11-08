<?php
require_once('inc/inc.php');
require_once('func/func_add_new_member_sys_act.php');

$db->debug();

$new_account = ft(trim($_POST['new_account']),1);
$new_password = ft(trim($_POST['new_password']),1);
$new_password_check = ft(trim($_POST['new_password_check']),1);
$name = ft(trim($_POST['name']),1);
$email = ft(trim($_POST['email']),1);

$crypt_cookie = new phpcrypt();

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

//密碼(加密)
$user_pd = ft(trim(eliteEncrypt($new_password,$new_account)),1);

//建立新帳號
$arr_input['name'] = $new_account;
$arr_input['email'] = $email;
$arr_input['password'] = $user_pd;
$arr_input['created_at'] = date('Y-m-d H:i:s');

$res = db_add_users($db,$arr_input);
unset($arr_input);

redirect_js_href('新增成功','add_new_member_sys.php');
exit();
?>