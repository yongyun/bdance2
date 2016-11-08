<?php
//搜尋案件區域
function db_get_system_case_class($db,$id)
{
	$sql = 'SELECT COUNT(scc_id) AS cnt,scc_id,scc_name 
			FROM system_case_class 
			WHERE scc_del = 0 AND scc_id = ? ';

	$sql_input['scc_id'] = $id;

	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}
?>
