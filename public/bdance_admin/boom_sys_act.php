<?php
require_once('inc/inc.php');
require_once('func/func_boom_sys_act.php');

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
	case 'synopsis_add':
		$title = ft($_POST['title'],1);
	
		if($title == '')
		{
			post_back('請輸入標題');
			exit();
		}

		//新增資料
		$arr_input['bl_title'] = $title;
		$arr_input['bl_date'] = date('Y-m-d H:i:s');

		$res = db_add_boom_list($db,$arr_input);
		unset($arr_input);
		
		//偵測並建立資料夾
		$dir = '../upload/boom/'.$res;
		$dir_view = 'upload/boom/'.$res;
		if(!is_dir($dir))
		{
			mkdir($dir,0777); 
		}
		
		$picname = $_FILES['mypic']['name'];
		$picsize = $_FILES['mypic']['size'];
		
		if ($picname != '') {
			$type = strstr($picname, '.');
			$rand = rand(100, 999);
			$pics = $res.'_'.date('YmdHis') . $rand . $type;

			$pic_path = $dir.'/'. $pics;
			$pic_path_view = $dir_view.'/'. $pics;
			move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
			
			$arr_input['bl_image'] = $pic_path_view;
			$arr_input['bl_update'] = date('Y-m-d H:i:s');
			db_mod_boom_list($db,$arr_input,$res);
			unset($arr_input);
		}
		
		reload_js_top_href('新增成功','boom_sys_ad.php?id='.$res);
		exit();
	break;
	
	case 'ad_images_mod':
		$id = ft($_POST['id'],0);
		$title = ft($_POST['title'],1);
	
		if($title == '')
		{
			post_back('請輸入標題');
			exit();
		}

		$res_old = db_get_boom_list_one($db,$id);
		
		//新增資料
		$arr_input['bl_title'] = $title;
		$arr_input['bl_update'] = date('Y-m-d H:i:s');

		db_mod_boom_list($db,$arr_input,$id);
		unset($arr_input);
		
		//偵測並建立資料夾
		$dir = '../upload/boom/'.$id;
		$dir_view = 'upload/boom/'.$id;
		
		$picname = $_FILES['mypic']['name'];
		$picsize = $_FILES['mypic']['size'];
		
		if ($picname != '') {
			$type = strstr($picname, '.');
			$rand = rand(100, 999);
			$pics = $id.'_'.date('YmdHis') . $rand . $type;

			$pic_path = $dir.'/'. $pics;
			$pic_path_view = $dir_view.'/'. $pics;
			move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
			
			$arr_input['bl_image'] = $pic_path_view;
			$arr_input['bl_update'] = date('Y-m-d H:i:s');
			db_mod_boom_list($db,$arr_input,$id);
			unset($arr_input);
			
			//刪除舊檔
			unlink('../'.$res_old['bl_image']);
		}
		
		reload_js_top_href('修改成功','boom_sys_info.php?id='.$id);
		exit();
	break;

	case 'ad_images_add':
		$id = ft($_POST['id'],0);
		$description = ft($_POST['description'],1);

		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}

		$picname = $_FILES['mypic']['name'];
		$picsize = $_FILES['mypic']['size'];
		
		if ($picname != '') {
			$type = strstr($picname, '.');
			$rand = rand(100, 999);
			$pics = $id.'_'.date('YmdHis') . $rand . $type;

			$pic_path = '../upload/boom/'.$id.'/'. $pics;
			move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
			
			$arr_input['ba_work'] = $id;
			$arr_input['ba_title'] = $description;
			$arr_input['ba_image'] = $pics;
			db_add_boom_ad($db,$arr_input);
			unset($arr_input);
		}
		
		reload_js_top_href('修改成功','boom_sys_ad.php?id='.$id);
		exit();
	break;
	
	case 'del':
		$id = ft($_GET['id'],0);
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}

		db_del_boom_ad($db,$id);
		db_del_boom_ad($db,$id);
		$dir = '../upload/boom/'.$id;
		rmdir($dir);
		
		redirect_js_href('刪除成功','works_sys.php');
		exit();

	break;

	case 'delimg':
		$image_id = ft($_POST['image_id'],0);
		if($image_id == '')
		{
			post_back('參數錯誤');
			exit();
		}
		if($image_id > 0)
		{			
			$res = db_del_boom_ad($db,$image_id);
			echo '1';
		}
		else
		{
			echo '刪除失敗.';
		}
		exit;
	break;

	case 'content_mod':
		$id = ft($_POST['id'],0);
		$top_content = $_POST['top_content'];
		
		$arr_input['bl_content'] = $top_content;
		$arr_input['bl_update'] = date('Y-m-d H:i:s');
		$res = db_mod_boom_list($db,$arr_input,$id);
		unset($arr_input);
		
		reload_js_top_href('修改成功','boom_sys_other.php?id='.$id);
		exit();
	break;

	case 'boom_show_mod':
		$id = ft($_POST['id'],0);
		$location = $_POST['location'];
		$duration = $_POST['duration'];
		$date = $_POST['date'];
		$video = $_POST['video'];
		$buy = $_POST['buy'];
		$workshop = $_POST['workshop'];
		
		$arr_input['bl_location'] = $location;
		$arr_input['bl_duration'] = $duration;
		$arr_input['bl_show'] = $date;
		$arr_input['bl_video'] = $video;
		$arr_input['bl_buy_now'] = $buy;
		$arr_input['bl_workshop'] = $workshop;
		$arr_input['bl_update'] = date('Y-m-d H:i:s');
		$res = db_mod_boom_list($db,$arr_input,$id);
		unset($arr_input);
		
		reload_js_top_href('修改成功','boom_sys_show.php?id='.$id);
		exit();
	break;

	default:
		post_back('參數錯誤');
		exit();
	break;
}
?>