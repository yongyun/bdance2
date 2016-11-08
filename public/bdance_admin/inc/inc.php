<?php
session_start();
header('Content-Type:text/html; charset=utf-8');
require_once('inc/db_info.php');
require_once('inc/web_info.php');
require_once('class/db_class.php');

$db = new DB();

require_once('class/captcha_class.php');
require_once('class/crypt_class.php');
require_once('func/func_sys_comm.php');
//FUNCTIONAL PAGER
require_once('class/pager/Pager.php');
require_once('func/func_pager.php');

require_once('func/func_login.php');
require_once('login.php');

?>
