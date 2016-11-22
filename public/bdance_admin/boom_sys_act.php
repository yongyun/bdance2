<?php
require_once('inc/inc.php');
require_once('func/func_boom_sys_act.php');

$act = ft($_POST['act'],1);
if($act == '')
{
	$act = ft($_GET['act'],1);
}

if($act == '')
{
	post_back('參數錯誤');
	exit();
}

switch($act)
{	
	case 'boom_mod':
		$bi_info = $_POST['bi_info'];

		$arr_input['bi_info'] = $bi_info;
		db_mod_boom_info($db,$arr_input,1);
		unset($arr_input);
		
		redirect_js_href('修改成功','boom_sys.php');
		exit();
	break;

	case 'media_mod':
		$id = $_POST['id'];
		$awardName = $_POST['awardName'];
		$description = $_POST['description'];

		$arr_input['awardName'] = $awardName;
		$arr_input['description'] = $description;
		$arr_input['updated_at'] = date('Y-m-d H:i:s');
		if($id == '')
		{
			$arr_input['created_at'] = date('Y-m-d H:i:s');
			db_add_about_media($db,$arr_input);
		}
		else
		{
			db_mod_about_media($db,$arr_input,$id);
		}
		unset($arr_input);
		
		redirect_js_href('修改成功','about_sys2.php');
		exit();

	break;

	case 'del_media':
		$id = ft($_GET['id'],0);
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}

		db_del_about_media($db,$id);
		
		redirect_js_href('刪除成功','about_sys2.php');
		exit();

	break;

	case 'awards_mod':
		$id = $_POST['id'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$awardName = $_POST['awardName'];

		$arr_input['title'] = $title;
		$arr_input['description'] = $description;
		$arr_input['awardName'] = $awardName;
		$arr_input['updated_at'] = date('Y-m-d H:i:s');
		if($id == '')
		{
			$arr_input['created_at'] = date('Y-m-d H:i:s');
			db_add_about_awards($db,$arr_input);
		}
		else
		{
			db_mod_about_awards($db,$arr_input,$id);
		}
		unset($arr_input);
		
		redirect_js_href('修改成功','about_sys3.php');
		exit();

	break;

	case 'del_awards':
		$id = ft($_GET['id'],0);
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}

		db_del_about_awards($db,$id);
		
		redirect_js_href('刪除成功','about_sys3.php');
		exit();

	break;

	default:
		post_back('參數錯誤');
		exit();
	break;
}
?>