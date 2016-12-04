<?php
function db_add_projects($db,$arr_input)
{
	$sql = 'INSERT INTO projects ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}

function db_mod_projects($db,$arr_input,$id)
{
	$sql = 'UPDATE projects ';
	$sql_where_condition = array('id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_add_photos($db,$arr_input)
{
	$sql = 'INSERT INTO photos ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}

function db_del_projects($db,$id)
{
	$sql = 'DELETE FROM projects ';
	$sql_where_condition = array('id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_del_awards_work_id($db,$id)
{
	$sql = 'DELETE FROM awards ';
	$sql_where_condition = array('work_id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_del_photos($db,$id)
{
	$sql = 'DELETE FROM photos ';
	$sql_where_condition = array('work_id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_del_photos_one($db,$id)
{
	$sql = 'DELETE FROM photos ';
	$sql_where_condition = array('id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_get_projects($db,$id)
{
	$sql = 'SELECT * 
			FROM projects 
			WHERE id = ?
			LIMIT 1';
	$sql_input['id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}

function db_add_tours($db,$arr_input)
{
	$sql = 'INSERT INTO tours ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}

function db_mod_tours($db,$arr_input,$id)
{
	$sql = 'UPDATE tours ';
	$sql_where_condition = array('id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_del_tours($db,$id)
{
	$sql = 'DELETE FROM tours ';
	$sql_where_condition = array('id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_del_tours_work_id($db,$id)
{
	$sql = 'DELETE FROM tours ';
	$sql_where_condition = array('work_id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_add_reviews($db,$arr_input)
{
	$sql = 'INSERT INTO reviews ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}

function db_mod_reviews($db,$arr_input,$id)
{
	$sql = 'UPDATE reviews ';
	$sql_where_condition = array('id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_del_reviews($db,$id)
{
	$sql = 'DELETE FROM reviews ';
	$sql_where_condition = array('id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_del_reviews_work_id($db,$id)
{
	$sql = 'DELETE FROM reviews ';
	$sql_where_condition = array('work_id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_add_stuffs($db,$arr_input)
{
	$sql = 'INSERT INTO stuffs ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}

function db_mod_stuffs($db,$arr_input,$id)
{
	$sql = 'UPDATE stuffs ';
	$sql_where_condition = array('id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_get_stuffs_one($db,$id)
{
	$sql = 'SELECT *  
			FROM stuffs 
			WHERE id = ? 
			LIMIT 1';
	$sql_input['id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}

function db_del_stuffs($db,$id)
{
	$sql = 'DELETE FROM stuffs ';
	$sql_where_condition = array('id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_del_stuffs_work_id($db,$id)
{
	$sql = 'DELETE FROM stuffs ';
	$sql_where_condition = array('work_id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_get_stuffs_rest($db,$id)
{
	$sql = 'SELECT id   
			FROM stuffs 
			WHERE work_id = ? AND rest_stuffs != "" 
			ORDER BY id ASC
			LIMIT 1';
	$sql_input['id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0]['id'];
}

function db_add_awards($db,$arr_input)
{
	$sql = 'INSERT INTO awards ';
	$res = $db->dbInsert($sql,$arr_input);
	return $res;
}

function db_mod_awards($db,$arr_input,$id)
{
	$sql = 'UPDATE awards ';
	$sql_where_condition = array('id');
	$sql_where_value = array($id);
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}

function db_get_awards_one($db,$id)
{
	$sql = 'SELECT *  
			FROM awards 
			WHERE id = ? 
			LIMIT 1';
	$sql_input['id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}

function db_del_awards($db,$id)
{
	$sql = 'DELETE FROM awards ';
	$sql_where_condition = array('id');
	$sql_where_value = array($id);
	$res = $db->dbDelete($sql,$sql_where_condition,$sql_where_value);
	return $res;
}
?>