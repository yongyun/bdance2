<?php
//搜尋帳號
function db_get_member($db,$id)
{
  $sql = 'SELECT m_id,m_password,m_user,m_name,m_email,m_type,m_datetime,m_err_cnt,m_del
			FROM member
			WHERE m_id = ? ';

  $sql_input['m_id'] = $id;

	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
}

//權限身份
function db_get_system_user_class($db)
{
  $sql = 'SELECT suc_id,suc_name
			FROM system_user_class
			WHERE suc_del = 0 ';

	$res = $db->dbSelect($sql,$arr_input);
	return $res;
}
?>
