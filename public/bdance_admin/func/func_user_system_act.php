<?php
//新增帳號
function db_add_users($db,$arr_input)
{
	$sql = 'INSERT INTO users ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}
?>