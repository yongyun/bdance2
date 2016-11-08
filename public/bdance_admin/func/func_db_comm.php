<?php
//==================
// 檢查權限通用式
//==================
function check_auth_option($db,$sao_sucid,$sao_page)
{
	$sql = 'SELECT sao_auth FROM system_auth_option WHERE sao_sucid = ? AND sao_page LIKE ? ';
	
	$arr_input[] = $sao_sucid;
	$arr_input[] = $sao_page.'%';
	
	$result = $db->dbSelectPrepare($sql,$arr_input);	
	return $result[0]['sao_auth'];
}

//顯示注意文字
function show_notice($notice,$notice_item)
{
	
	$val = '';
	$no = str_split($notice);
	foreach($no as $n)
	{
		if($notice_item[$n] != '')
		{
			if($val != '')
			{
				$val .= '/<br />';
			}
			$val .= $notice_item[$n];
		}
	}
	
	if($val == '')
	{
		$val = '無';
	}
	return $val;
}

//後台操作紀錄log寫入
function add_log($db,$log_input)
{
	$arr_input['sol_type'] = $log_input['sol_type'];
	$arr_input['sol_info'] = $log_input['sol_info'];
	$arr_input['sol_result'] = $log_input['sol_result'];
	$arr_input['sol_time'] = date("Y-m-d H:i:s");
	$arr_input['sol_ip'] = ft($_SERVER['REMOTE_ADDR'],1);
	$arr_input['sol_suid'] = SU_ID_D;
	
	$sql = 'INSERT INTO system_operate_log';
	
	$res = $db->dbInsertPrepare($sql,$arr_input);
	return $res; 
}
?>
