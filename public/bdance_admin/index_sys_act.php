<?php
require_once('inc/inc.php');
require_once('func/func_index_sys_act.php');

$act = ft($_POST['act'],1);
if($act == '')
{
	$act = ft($_GET['act'],1);
}

if($act == '')
{
	post_back('參數錯誤');
	exit();
}

switch($act)
{	
	case 'add':
		$data_type = $_POST['type'];
	
		if($data_type == '')
		{
			$arr = array(
				'status'=>'error',
				'error'=>'缺少參數'
			);
			echo json_encode($arr);
			exit;
		}

		$picname = $_FILES['mydata']['name'];
		$picsize = $_FILES['mydata']['size'];
	
		if($picname  == '')
		{
			$arr = array(
				'status'=>'error',
				'error'=>'格式不符'
			);
			echo json_encode($arr);
			exit;
		}

		if ($picname != '') 
		{
			$type = strstr($picname, '.');
			$rand = rand(100, 999);
			$pics = date('YmdHis') . $rand . $type;

			if($data_type == 'video')
			{
				$iv_type = '0';
				if($type != '.mp4' && $type != '.MP4')
				{
					$arr = array(
						'status'=>'error',
						'error'=>'上傳格式不符,只能是mp4'
					);
					echo json_encode($arr);
					exit;
				}
				
				if($picsize  > 4194304)
				{
					$arr = array(
						'status'=>'error',
						'error'=>'檔案大小限制4MB'
					);
					echo json_encode($arr);
					exit;
				}
			}

			if($data_type == 'images')
			{
				$iv_type = 1;
				if($type !='.jpg' && $type != '.JPG' && $type !='.gif' && $type !='.GIF')
				{
					$arr = array(
						'status'=>'error',
						'error'=>'上傳格式不符,只能是jpg、gif'
					);
					echo json_encode($arr);
					exit;
				}	
			}
			
			$pic_path = '../upload/index/'. $pics;
			$pic_path_view = 'upload/index/'. $pics;
			move_uploaded_file($_FILES['mydata']['tmp_name'], $pic_path);
			
			$arr_input['iv_type'] = $iv_type;
			$arr_input['iv_data'] = $pic_path_view;
			db_add_index_view($db,$arr_input);
			unset($arr_input);
		}
		
		$size = round($picsize/1024,2);
		$arr = array(
			'status'=>'ok',
			'name'=>$picname,
			'pic'=>$pics,
			'size'=>$size
		);
		echo json_encode($arr);
		exit();
	break;

	case 'del':
		$id = ft($_GET['id'],0);
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}

		//查詢舊檔案
		$res_old = db_get_index_view_one($db,$id);
		
		db_del_index_view($db,$id);
		
		unlink('../'.$res_old['iv_data']);
		
		redirect_js_href('刪除成功','index_sys.php');
		exit();

	break;

	case 'link_mod':
		$fb_link = $_POST['fb_link'];
		$vimeo_link = $_POST['vimeo_link'];
		$axearts_link = $_POST['axearts_link'];

		$arr_input['ml_link'] = $fb_link;
		db_mod_menu_link($db,$arr_input,1);
		unset($arr_input);

		$arr_input['ml_link'] = $vimeo_link;
		db_mod_menu_link($db,$arr_input,2);
		unset($arr_input);

		$arr_input['ml_link'] = $axearts_link;
		db_mod_menu_link($db,$arr_input,3);
		unset($arr_input);
		
		redirect_js_href('修改成功','index_sys_link.php');
		exit();

	break;

	default:
		post_back('參數錯誤');
		exit();
	break;
}
?>