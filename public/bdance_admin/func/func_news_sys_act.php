<?php
function db_add_news($db,$arr_input)
{
	$sql = 'INSERT INTO news ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}

function db_add_news_ad($db,$arr_input)
{
	$sql = 'INSERT INTO news_ad ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}

function db_mod_news($db,$arr_input,$id)
{
	$sql = 'UPDATE news ';
	$sql_where_condition = array('nw_id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_add_news_video($db,$arr_input)
{
	$sql = 'INSERT INTO news_video ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}

function db_mod_news_ad($db,$arr_input,$id)
{
	$sql = 'UPDATE news_ad ';
	$sql_where_condition = array('na_id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_mod_news_video($db,$arr_input,$id)
{
	$sql = 'UPDATE news_video ';
	$sql_where_condition = array('nv_id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}
?>