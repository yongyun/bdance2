<?php
require_once('inc/inc.php');
require_once('func/func_case_class_add_mod_act.php');

$act = ft($_POST['act'],1);
$id = ft($_POST['id'],0);
$case_name = ft($_POST['case_name'],1);

if($act == '')
{
	$act = ft($_GET['act'],1);
	$id = ft($_GET['id'],0);
}

//防呆
if($act == '')
{
	post_back('缺少參數');
	exit();
}


switch($act)
{
	case 'add':
		if($case_name == '')
		{
			post_back('請輸入區域名稱');
			exit();
		}
		
		//建立新帳號
		$arr_input['scc_name'] = $case_name;
		$arr_input['scc_date'] = date('Y-m-d H:i:s');

		$res = db_add_system_case_class($db,$arr_input);
		unset($arr_input);

		//操作記錄
		$arr_input['sy_ip'] = $su_ip;
		$arr_input['sy_uid'] = $mem_info['m_id'];
		$arr_input['sy_info'] = 'case_class_add_mod';
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
			post_back('缺少參數');
			exit();
		}
		if($case_name == '')
		{
			post_back('請輸入區域名稱');
			exit();
		}
		$arr_input['scc_name'] = $case_name;
		$res = db_mod_system_case_class($db,$arr_input,$id);
		unset($arr_input);
		
		//防呆
		if($res == 0)
		{
			post_back('存檔錯誤，請重新修改');
			exit();
		}

		//操作記錄
		$arr_input['sy_ip'] = $su_ip;
		$arr_input['sy_uid'] = $mem_info['m_id'];
		$arr_input['sy_info'] = 'case_class_add_mod';
		$arr_input['sy_modify_id'] = $id;
		$arr_input['sy_browser'] = $su_agent;
		$arr_input['sy_date'] = date('Y-m-d H:i:s');
		db_add_system_log($db,$arr_input,$id);
		unset($arr_input);
		
		reload_js_top('修改成功');
		exit();
	break;
	
	case 'del':
		if($id == '')
		{
			post_back('缺少參數');
			exit();
		}
		$arr_input['scc_del'] = 1;
		$res = db_mod_system_case_class($db,$arr_input,$id);
		unset($arr_input);

		//操作記錄
		$arr_input['sy_ip'] = $su_ip;
		$arr_input['sy_uid'] = $mem_info['m_id'];
		$arr_input['sy_info'] = 'case_class_del';
		$arr_input['sy_modify_id'] = $id;
		$arr_input['sy_browser'] = $su_agent;
		$arr_input['sy_date'] = date('Y-m-d H:i:s');
		db_add_system_log($db,$arr_input);
		unset($arr_input);
		
		redirect_js_href('修改成功','case_class_sys.php');
		exit();

	break;

	default:
		post_back('參數錯誤');
		exit();
	break;
}
?>