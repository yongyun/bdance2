<?php
function db_add_index_view($db,$arr_input)
{
	$sql = 'INSERT INTO index_view ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}

function db_del_index_view($db,$id)
{
	$sql = 'DELETE FROM index_view ';
	$sql_where_condition = array('iv_id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_get_index_view_one($db,$id)
{
	$sql = 'SELECT *  
			FROM index_view 
			WHERE iv_id = ? 
			LIMIT 1';
	$sql_input['iv_id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}

function db_mod_menu_link($db,$arr_input,$id)
{
	$sql = 'UPDATE menu_link ';
	$sql_where_condition = array('ml_id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}
?>