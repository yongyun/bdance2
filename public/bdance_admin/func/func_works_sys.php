<?php
function db_get_projects($db,$arr_input,$arr_page = null)
{
	$def = 'WHERE 1 ';
	
	if(@$arr_input['id'] != '')
	{
		$def .= ' AND id = ? ';
		$sql_input[] = @$arr_input['id'];
	}
	
	if(@$arr_input['expect_date_op'] != '')
	{
		$def .= ' AND perform_date >= ? ';
		$sql_input[] = @$arr_input['expect_date_op'];
	}
	
	if(@$arr_input['expect_date_ed'] != '')
	{
		$def .= ' AND perform_date <= ? ';
		$sql_input[] = @$arr_input['expect_date_ed'];
	}
	
	if(count($arr_page) == 0)
	{
		$sql = 'SELECT COUNT(id) AS cnt 
				FROM projects 
				'.$def;
	}
	else
	{
		$sql = 'SELECT id,name,intro,description,video_url,perform_date,created_at,updated_at,feature_img,duration,premiere,video_chanel 
				FROM projects 
				'.$def.'
				ORDER BY id DESC';
		$sql .= get_page_limit($arr_page);		
	}
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}

function db_get_photos($db,$id)
{
	$sql = 'SELECT id,url,description 
			FROM photos 
			WHERE work_id = ?
			ORDER BY id DESC';
	$sql_input['work_id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}

function db_get_tours($db,$id)
{
	$sql = 'SELECT *  
			FROM tours 
			WHERE work_id = ?
			ORDER BY tour_date ASC,id ASC';
	$sql_input['work_id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}

function db_get_tours_one($db,$id)
{
	$sql = 'SELECT *  
			FROM tours 
			WHERE id = ? 
			LIMIT 1';
	$sql_input['id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}

function db_get_reviews($db,$id)
{
	$sql = 'SELECT *  
			FROM reviews 
			WHERE work_id = ?
			ORDER BY id ASC';
	$sql_input['work_id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}

function db_get_reviews_one($db,$id)
{
	$sql = 'SELECT *  
			FROM reviews 
			WHERE id = ? 
			LIMIT 1';
	$sql_input['id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}

function db_get_stuffs($db,$id)
{
	$sql = 'SELECT *  
			FROM stuffs 
			WHERE work_id = ? 
			ORDER BY id ASC';
	$sql_input['work_id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
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
?>