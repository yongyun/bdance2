<?php
function db_get_slogan($db,$id)
{
	$sql = 'SELECT *  
			FROM slogan 
			WHERE id = ? 
			LIMIT 1';
	$sql_input['id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}
function db_get_about_media($db)
{
	$sql = 'SELECT *  
			FROM about_media 
			ORDER BY am_id DESC';
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}
function db_get_about_media_one($db,$id)
{
	$sql = 'SELECT *  
			FROM about_media 
			WHERE am_id = ? 
			LIMIT 1';
	$sql_input['am_id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}
function db_get_about_awards($db)
{
	$sql = 'SELECT *  
			FROM about_awards 
			ORDER BY id DESC';
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}
function db_get_about_awards_one($db,$id)
{
	$sql = 'SELECT *  
			FROM about_awards 
			WHERE id = ? 
			LIMIT 1';
	$sql_input['id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}
?>