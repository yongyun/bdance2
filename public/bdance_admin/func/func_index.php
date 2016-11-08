<?php
//搜尋權限身份
function db_get_member_info($db,$arr_input = '')
{
	$def = ' WHERE 1';
	
	if($arr_input['m_user'] != '')
	{
		$def .= ' AND m_user = ?';
		$sql_input['m_user'] = $arr_input['m_user'];
	}
	
	$sql = 'SELECT * 
			FROM member 
			'.$def.'
			ORDER BY m_id ASC';
	
	$res = $db->dbSelect($sql,$arr_input);
	return $res;
}

//搜尋案件區域分類
function db_get_system_case_class($db,$arr_input = '')
{
	$def = ' WHERE 1';
	
	if($arr_input['scc_id'] != '')
	{
		$def .= ' AND scc_id = ?';
		$sql_input['scc_id'] = $arr_input['case_class'];
	}
	
	$sql = 'SELECT * 
			FROM system_case_class 
			'.$def.'
			ORDER BY scc_id ASC';
	
	$res = $db->dbSelect($sql,$arr_input);
	return $res;
}

?>