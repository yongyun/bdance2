<?php
function db_add_boom_list($db,$arr_input)
{
	$sql = 'INSERT INTO boom_list ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}

function db_mod_boom_list($db,$arr_input,$id)
{
	$sql = 'UPDATE boom_list ';
	$sql_where_condition = array('bl_id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_add_boom_ad($db,$arr_input)
{
	$sql = 'INSERT INTO boom_ad ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}

function db_mod_boom_ad($db,$arr_input,$id)
{
	$sql = 'UPDATE boom_ad ';
	$sql_where_condition = array('ba_id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_mod_boom_info($db,$arr_input,$id)
{
	$sql = 'UPDATE boom_info ';
	$sql_where_condition = array('bi_id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}


function db_get_boom_list_one($db,$id)
{
	$sql = 'SELECT *  
			FROM boom_list 
			WHERE bl_id = ? 
			LIMIT 1';
	$sql_input['bl_id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}


function db_del_boom_list($db,$id)
{
	$sql = 'DELETE FROM boom_list ';
	$sql_where_condition = array('bl_id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_del_boom_ad($db,$id)
{
	$sql = 'DELETE FROM boom_ad ';
	$sql_where_condition = array('ba_id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_add_boom_user($db,$arr_input)
{
	$sql = 'INSERT INTO boom_user ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}
function db_mod_boom_user($db,$arr_input,$id)
{
	$sql = 'UPDATE boom_user ';
	$sql_where_condition = array('bu_id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_del_boom_user($db,$id)
{
	$sql = 'DELETE FROM boom_user ';
	$sql_where_condition = array('bu_id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}


?>