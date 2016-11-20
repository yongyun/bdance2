<?php
function db_get_messages($db,$arr_input,$arr_page = null)
{
	$def = 'WHERE 1 ';
	
	if(@$arr_input['id'] != '')
	{
		$def .= ' AND id = ? ';
		$sql_input[] = @$arr_input['id'];
	}
	
	if(@$arr_input['expect_date_op'] != '')
	{
		$def .= ' AND created_at >= ? ';
		$sql_input[] = @$arr_input['expect_date_op'];
	}
	
	if(@$arr_input['expect_date_ed'] != '')
	{
		$def .= ' AND created_at <= ? ';
		$sql_input[] = @$arr_input['expect_date_ed'];
	}

	if(@$arr_input['screach_str'] != '')
	{
		$def .= ' AND name LIKE ? OR email LIKE ? OR message LIKE ?';
		$sql_input['name'] = @$arr_input['screach_str'];
		$sql_input['email'] = @$arr_input['screach_str'];
		$sql_input['message'] = @$arr_input['screach_str'];
	}
	
	if(count($arr_page) == 0)
	{
		$sql = 'SELECT COUNT(id) AS cnt 
				FROM messages 
				'.$def;
	}
	else
	{
		$sql = 'SELECT id,name,email,message,created_at 
				FROM messages 
				'.$def.'
				ORDER BY id DESC';
		$sql .= get_page_limit($arr_page);		
	}
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}

?>