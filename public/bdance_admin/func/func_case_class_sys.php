<?php
//搜尋權限身份
function db_get_system_case_class($db)
{
	$sql = 'SELECT * 
			FROM system_case_class 
			WHERE scc_del = 0 ';
	
	$res = $db->dbSelect($sql,$arr_input);
	return $res;
}

?>