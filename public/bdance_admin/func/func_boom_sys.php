<?php
function db_get_boom_info($db,$id)
{
	$sql = 'SELECT bi_info 
			FROM boom_info 
			WHERE bi_id = ?';
	$sql_input['bi_id'] = $id;
	
	$res = $db->dbSelect($sql,$sql_input);
	return $res[0];
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