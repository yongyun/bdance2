<?php
function db_mod_slogan($db,$arr_input,$id)
{
	$sql = 'UPDATE slogan ';
	$sql_where_condition = array('id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}
function db_mod_about_media($db,$arr_input,$id)
{
	$sql = 'UPDATE about_media ';
	$sql_where_condition = array('am_id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}
function db_add_about_media($db,$arr_input)
{
	$sql = 'INSERT INTO about_media ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}
function db_del_about_media($db,$id)
{
	$sql = 'DELETE FROM about_media ';
	$sql_where_condition = array('am_id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}
function db_add_about_awards($db,$arr_input)
{
	$sql = 'INSERT INTO about_awards ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}
function db_mod_about_awards($db,$arr_input,$id)
{
	$sql = 'UPDATE about_awards ';
	$sql_where_condition = array('id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}
function db_del_about_awards($db,$id)
{
	$sql = 'DELETE FROM about_awards ';
	$sql_where_condition = array('id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}
?>