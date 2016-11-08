<?php
//新增案件區域
function db_add_system_case_class($db,$arr_input)
{
	$sql = 'INSERT INTO system_case_class ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}

//修改帳號
function db_mod_system_case_class($db,$arr_input,$id)
{
	$sql = 'UPDATE system_case_class ';
	$sql_where_condition = array('scc_id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}
?>