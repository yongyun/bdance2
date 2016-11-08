<?php
//檢查帳號密碼正確
function db_get_users_check($db,$arr_input)
{
	$def = 'WHERE name = ? ';
	$sql_input['name'] = $arr_input['m_user'];
	
	if($arr_input['m_password'] != '')
	{
		$def .= ' AND password = ? ';
		$sql_input['password'] = $arr_input['m_password'];
	}

	$sql = 'SELECT * 
			FROM users 
			'.$def.'
			LIMIT 1';
	$res = $db->dbSelect($sql,$sql_input);
	return $res;
}

//帳號資訊
function db_get_users_my_data($db,$m_id)
{
	$sql = 'SELECT * 
			FROM users 
			WHERE id = ? 
			LIMIT 1';
	$sql_input['id'] = $m_id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}

//修改帳戶資訊
function db_mod_users($db,$arr_input,$mid)
{
	$sql = 'UPDATE users ';
	$sql_where_condition = array('id');
	$sql_where_value = array($mid);
	
	$res = $db->dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value);
	return $res;
}
?>