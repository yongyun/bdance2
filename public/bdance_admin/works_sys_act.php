<?php
require_once('inc/inc.php');
require_once('func/func_works_sys_act.php');

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
		$intro = ft($_POST['intro'],1);
		$perform_date = ft($_POST['perform_date'],1);
	
		if($title == '')
		{
			post_back('請輸入標題');
			exit();
		}
		if($perform_date == '')
		{
			post_back('請輸入日期');
			exit();
		}

		//新增資料
		$arr_input['name'] = $title;
		$arr_input['intro'] = $intro;
		$arr_input['perform_date'] = $perform_date;
		$arr_input['created_at'] = date('Y-m-d H:i:s');

		$res = db_add_projects($db,$arr_input);
		unset($arr_input);
		
		//偵測並建立資料夾
		$dir = '../photos/'.$res;
		$dir_view = 'photos/'.$res;
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
			
			$arr_input['feature_img'] = $pic_path_view;
			$arr_input['updated_at'] = date('Y-m-d H:i:s');
			db_mod_projects($db,$arr_input,$res);
			unset($arr_input);
		}
		
		reload_js_top_href('新增成功','works_sys_content2.php?id='.$res);
		exit();
	break;
	
	case 'synopsis_mod':
		$id = ft($_POST['id'],0);
		$title = ft($_POST['title'],1);
		$intro = ft($_POST['intro'],1);
		$perform_date = ft($_POST['perform_date'],1);
	
		if($title == '')
		{
			post_back('請輸入標題');
			exit();
		}
	
		if($perform_date == '')
		{
			post_back('請輸入日期');
			exit();
		}

		$picname = $_FILES['mypic']['name'];
		$picsize = $_FILES['mypic']['size'];
		
		if ($picname != '') {
			//查詢舊檔案
			$res_old = db_get_projects($db,$id);

			$type = strstr($picname, '.');
			$rand = rand(100, 999);
			$pics = $id.'_'.date('YmdHis') . $rand . $type;

			$dir = '../photos/'.$id;
			$dir_view = 'photos/'.$id;
			$pic_path = $dir.'/'. $pics;
			$pic_path_view = $dir_view.'/'. $pics;
			move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);

			$arr_input['feature_img'] = $pic_path_view;
			
			//刪除舊檔
			unlink('../'.$res_old['feature_img']);
		}
		
		$arr_input['name'] = $title;
		$arr_input['intro'] = $intro;
		$arr_input['perform_date'] = $perform_date;
		$arr_input['updated_at'] = date('Y-m-d H:i:s');
		db_mod_projects($db,$arr_input,$id);
		unset($arr_input);
		
		reload_js_top_href('修改成功','works_sys_content1.php?id='.$id);
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
		if ($picname == '') 
		{
			post_back('請上傳圖片');
			exit();
		}	
		
		if ($picname != '') 
		{
			$type = strstr($picname, '.');
			$rand = rand(100, 999);
			$pics = $id.'_'.date('YmdHis') . $rand . $type;

			$pic_path = '../photos/'.$id.'/'. $pics;
			$pic_path_src = 'photos/'.$id.'/'. $pics;
			move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
			
			$arr_input['work_id'] = $id;
			$arr_input['url'] = $pic_path_src;
			$arr_input['description'] = $description;
			$arr_input['created_at'] = date('Y-m-d H:i:s');
			db_add_photos($db,$arr_input);
			unset($arr_input);
		}
		
		reload_js_top_href('修改成功','works_sys_content2.php?id='.$id);
		exit();
	break;
	
	case 'information_mod':
		$id = ft($_POST['id'],0);
		$content = $_POST['content'];

		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}
	
		$arr_input['description'] = $content;
		$arr_input['updated_at'] = date('Y-m-d H:i:s');
		db_mod_projects($db,$arr_input,$id);
		unset($arr_input);

		reload_js_top_href('修改成功','works_sys_content3.php?id='.$id);
		exit();
	break;
	
	case 'details_mod':
		$id = ft($_POST['id'],0);
		$duration = ft($_POST['duration'],1);
		$premiere = ft($_POST['premiere'],1);

		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}
	
		$arr_input['duration'] = $duration;
		$arr_input['premiere'] = $premiere;
		$arr_input['updated_at'] = date('Y-m-d H:i:s');
		db_mod_projects($db,$arr_input,$id);
		unset($arr_input);

		reload_js_top_href('修改成功','works_sys_content4.php?id='.$id);
		exit();
	break;
	
	case 'tour_date_mod':
		$id = ft($_POST['id'],0);
		$tid = ft($_POST['tid'],0);
		$tour_date = ft($_POST['tour_date'],1);
		$name = ft($_POST['name'],1);
		$performed = ft($_POST['performed'],1);

		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}

		if($tour_date == '')
		{
			post_back('請選擇日期');
			exit();
		}
	
		$arr_input['work_id'] = $id;
		$arr_input['tour_date'] = $tour_date;
		$arr_input['name'] = $name;
		$arr_input['performed'] = $performed;
		if($tid == '')
		{
			db_add_tours($db,$arr_input);
			unset($arr_input);
		}
		else
		{
			db_mod_tours($db,$arr_input,$tid);
			unset($arr_input);
		}

		reload_js_top_href('修改成功','works_sys_content5.php?id='.$id);
		exit();
	break;
	
	case 'del_tours':
		$id = ft($_GET['id'],0);
		$tid = ft($_GET['tid'],0);

		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}

		if($tid == '')
		{
			post_back('參數錯誤');
			exit();
		}
	
		db_del_tours($db,$tid);

		reload_js_top_href('刪除成功','works_sys_content5.php?id='.$id);
		exit();
	break;
	
	case 'video_add':
		$id = ft($_POST['id'],0);
		$video = $_POST['video'];

		//新增資料
		$arr_input['video_url'] = $video;
		$res = db_mod_projects($db,$arr_input,$id);
		unset($arr_input);
		
		reload_js_top_href('修改成功','works_sys_content6.php?id='.$id);
		exit();
	break;
	
	case 'del':
		$id = ft($_GET['id'],0);
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}

		db_del_projects($db,$id);
		db_del_photos($db,$id);
		$dir = '../photos/'.$id;
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
			$res = db_del_photos_one($db,$image_id);
			echo '1';
		}
		else
		{
			echo '刪除失敗.';
		}
		exit;
	break;

	case 'reviews_mod':
		$id = ft($_POST['id'],0);
		$rid = ft($_POST['rid'],0);
		$created_at = ft($_POST['created_at'],1);
		$reviewer = ft($_POST['reviewer'],1);
		$content = ft($_POST['content'],1);
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}
		
		$arr_input['work_id'] = $id;
		$arr_input['reviewer'] = $reviewer;
		$arr_input['content'] = $content;
		$arr_input['created_at'] = $created_at;		
		$arr_input['updated_at'] = date('Y-m-d');		
		if($rid == '')
		{
			db_add_reviews($db,$arr_input);
			unset($arr_input);
		}
		else
		{
			db_mod_reviews($db,$arr_input,$rid);
			unset($arr_input);
		}

		reload_js_top_href('修改成功','works_sys_content7.php?id='.$id);
		exit();
	
	break;
	
	case 'del_reviews':
		$id = ft($_GET['id'],0);
		$rid = ft($_GET['rid'],0);
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}

		db_del_reviews($db,$rid);
		
		redirect_js_href('刪除成功','works_sys_content7.php?id='.$id);
		exit();	
	break;
	
	case 'stuffs_mod':
		$id = ft($_POST['id'],0);
		$sid = ft($_POST['sid'],0);
		$s_type = ft($_POST['type'],1);
		$name = ft($_POST['name'],1);
		$role = ft($_POST['role'],1);
		$content = $_POST['content'];
		
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}
		
		if($s_type == 'primary')
		{
			if($name == '')
			{
				post_back('未輸入暱稱');
				exit();
			}

			$picname = $_FILES['mypic']['name'];
			$picsize = $_FILES['mypic']['size'];
			if($sid == '')
			{
				if ($picname == '') 
				{
					post_back('請上傳圖片');
					exit();
				}	
			}
			
			$arr_input['work_id'] = $id;
			$arr_input['name'] = $name;
			$arr_input['type'] = $s_type;
			if($sid == '')
			{
				$arr_input['created_at'] = date('Y-m-d H:i:s');
			}
			$arr_input['updated_at'] = date('Y-m-d H:i:s');
			$arr_input['role'] = $role;
			if($picname != '') 
			{
				if($sid != '')
				{
					$res_old = db_get_stuffs_one($db,$sid);
				}
				$type = strstr($picname, '.');
				$rand = rand(100, 999);
				$pics = $id.'_'.date('YmdHis') . $rand . $type;

				$pic_path = '../photos/'.$id.'/'. $pics;
				$pic_path_src = 'photos/'.$id.'/'. $pics;
				move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
				
				if($sid != '')
				{
					//刪除舊檔
					unlink('../'.$res_old['photo']);
				}
				$arr_input['photo'] = $pic_path_src;
			}
			if($sid == '')
			{
				db_add_stuffs($db,$arr_input);
			}
			else
			{
				db_mod_stuffs($db,$arr_input,$sid);
			}
		}
		unset($arr_input);
		
		if($s_type == 'secondary')
		{
			$stuffs_rest_id = db_get_stuffs_rest($db,$id);
			
			$arr_input['work_id'] = $id;
			$arr_input['type'] = 'secondary';
			$arr_input['rest_stuffs'] = $content;
			if($stuffs_rest_id == '')
			{
				db_add_stuffs($db,$arr_input);
			}
			else
			{
				
				db_mod_stuffs($db,$arr_input,$stuffs_rest_id);
			}
		}
		
		unset($arr_input);
		
		reload_js_top_href('修改成功','works_sys_content8.php?id='.$id);
		exit();
	break;
	
	case 'del_stuffs':
		$id = ft($_GET['id'],0);
		$sid = ft($_GET['sid'],0);
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}
		if($sid == '')
		{
			post_back('參數錯誤');
			exit();
		}

		//查詢舊檔案
		$res_old = db_get_stuffs_one($db,$sid);
		
		db_del_stuffs($db,$sid);
		
		unlink('../'.$res_old['photo']);
		
		reload_js_top_href('修改成功','works_sys_content8.php?id='.$id);
		exit();

	break;
	
	case 'awards_mod':
		$id = ft($_POST['id'],0);
		$aid = ft($_POST['aid'],0);
		$title = ft($_POST['title'],1);
		$awardName = ft($_POST['awardName'],1);
		$content = $_POST['content'];
		
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}
		
		$arr_input['work_id'] = $id;
		$arr_input['title'] = $title;
		$arr_input['awardName'] = $awardName;
		$arr_input['description'] = $content;
		$arr_input['updated_at'] = date('Y-m-d H:i:s');
		if($aid == '')
		{
			$arr_input['created_at'] = date('Y-m-d H:i:s');
			db_add_awards($db,$arr_input);
		}
		else
		{
			db_mod_awards($db,$arr_input,$aid);
		}
		unset($arr_input);
		
		reload_js_top_href('修改成功','works_sys_content9.php?id='.$id);
		exit();
	break;
	
	case 'del_awards':
		$id = ft($_GET['id'],0);
		$aid = ft($_GET['aid'],0);
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}
		if($aid == '')
		{
			post_back('參數錯誤');
			exit();
		}

		db_del_awards($db,$aid);
		
		reload_js_top_href('修改成功','works_sys_content9.php?id='.$id);
		exit();

	break;
	
	default:
		post_back('參數錯誤');
		exit();
	break;
}
?>