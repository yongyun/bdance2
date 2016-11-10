<?php
function db_get_news($db,$arr_input,$arr_page = null)
{
	$def = 'WHERE nw_del = 0 ';
	
	if($arr_input['nw_id'] != '')
	{
		$def .= ' AND nw_id = ? ';
		$sql_input[] = $arr_input['nw_id'];
	}
	
	if($arr_input['expect_date_op'] != '')
	{
		$def .= ' AND nw_date >= ? ';
		$sql_input[] = $arr_input['expect_date_op'];
	}
	
	if($arr_input['expect_date_ed'] != '')
	{
		$def .= ' AND nw_date <= ? ';
		$sql_input[] = $arr_input['expect_date_ed'];
	}

	if($arr_input['screach_str'] != '')
	{
		$def .= ' AND nw_title LIKE ? OR nw_synopsis LIKE ? OR nw_content LIKE ?';
		$sql_input['nw_title'] = $arr_input['screach_str'];
		$sql_input['nw_synopsis'] = $arr_input['screach_str'];
		$sql_input['nw_content'] = $arr_input['screach_str'];
	}
	
	if(count($arr_page) == 0)
	{
		$sql = 'SELECT COUNT(nw_id) AS cnt 
				FROM news 
				'.$def;
	}
	else
	{
		$sql = 'SELECT nw_id,nw_user,nw_title,nw_synopsis,nw_top_content,nw_content,nw_date,nw_update,nw_status,nw_link 
				FROM news 
				'.$def;
		$sql .= get_page_limit($arr_page);		
	}
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}

function db_get_news_ad($db,$id)
{
	$sql = 'SELECT * 
			FROM news_ad 
			WHERE na_del = 0 AND na_nwid = ?';
	$sql_input['na_id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}

function db_get_news_video($db,$id)
{
	$sql = 'SELECT * 
			FROM news_video 
			WHERE nv_del = 0 AND nv_nwid = ?';
	$sql_input['nv_nwid'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}
?>