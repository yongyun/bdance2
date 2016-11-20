<?php
function db_get_index_view($db,$id)
{
	$sql = 'SELECT *  
			FROM index_view 
			ORDER BY iv_id ASC';
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}

function db_get_index_view_one($db,$id)
{
	$sql = 'SELECT *  
			FROM index_view 
			WHERE iv_id = ? 
			LIMIT 1';
	$sql_input['id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}

function db_get_menu_link($db,$id)
{
	$sql = 'SELECT ml_link  
			FROM menu_link 
			WHERE ml_id = ? 
			LIMIT 1';
	$sql_input['ml_id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}
?>