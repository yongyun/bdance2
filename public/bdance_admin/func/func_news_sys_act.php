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

function db_get_news_all($db,$arr_input)
{
	$def = 'WHERE nw_del = 0 ';
	if($arr_input['item'] != '')
	{
		$def .= ' AND nw_item > ? ';
		$sql_input['nw_item'] = $arr_input['item'];
	}
	
	$sql = 'SELECT nw_id,nw_item 
			FROM news 
			'.$def.' 
			ORDER BY nw_item ASC';
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}

function db_get_news_item($db,$arr_input)
{
	$def = 'WHERE nw_del = 0 AND nw_item = ? ';
	$sql_input['nw_item'] = $arr_input['item'];
	
	$sql = 'SELECT nw_id,nw_item 
			FROM news 
			'.$def.' 
			LIMIT 1';
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}

function db_get_news_item_end($db)
{
	$def = 'WHERE nw_del = 0 ';
	
	$sql = 'SELECT nw_id,nw_item 
			FROM news 
			WHERE nw_del = 0 
			ORDER BY nw_item DESC
			LIMIT 1';
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}

?>