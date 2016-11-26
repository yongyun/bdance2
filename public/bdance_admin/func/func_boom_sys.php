<?php
function db_get_boom_info($db,$id)
{
	$sql = 'SELECT bi_info 
			FROM boom_info 
			WHERE bi_id = ?';
	$sql_input['bi_id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}
function db_get_boom_list_one($db,$id)
{
	$sql = 'SELECT bl_id,bl_title,bl_image 
			FROM boom_list 
			WHERE bl_del = 0 AND bl_id = ?';
	$sql_input['bl_id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}

function db_get_boom_ad($db,$id)
{
	$sql = 'SELECT * 
			FROM boom_ad 
			WHERE ba_work = ?';
	$sql_input['ba_work'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}
function db_get_boom_list($db,$id)
{
	$sql = 'SELECT bl_id,bl_title,bl_date,bl_update 
			FROM boom_list 
			WHERE bl_del = 0';
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}

function db_get_boom_list_bl($db,$id)
{
	$sql = 'SELECT * 
			FROM boom_list 
			WHERE bl_id = ?';
	$sql_input['bl_id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}
function db_get_boom_user($db,$arr_input)
{
	$sql = 'SELECT * 
			FROM boom_user
			WHERE bu_work = ?';
	
	$sql_input['bu_work'] = $arr_input['id'];
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}
function db_get_boom_user_one($db,$arr_input)
{
	$sql = 'SELECT * 
			FROM boom_user
			WHERE bu_id = ?';
	
	$sql_input['bu_id'] = $arr_input['bu_id'];
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}

?>