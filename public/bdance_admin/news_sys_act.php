<?php
require_once('inc/inc.php');
require_once('func/func_news_sys_act.php');

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
		$synopsis = ft($_POST['synopsis'],1);
		$status = ft($_POST['status'],0);
		$item = ft($_POST['item'],0);
	
		if($title == '')
		{
			post_back('請輸入標題');
			exit();
		}

		if($item == 0)
		{
			$res_news = db_get_news_all($db);
			if(count($res_news) > 0)
			{
				foreach($res_news as $k => $row)
				{
					$arr_input['nw_item'] = $k + 2;
					db_mod_news($db,$arr_input,$row['nw_id']);
					unset($arr_input);
				}
			}
			$item = 1;
		}
		else
		{
			$arr_input['item'] = $item;
			$res_news = db_get_news_all($db,$arr_input);
			unset($arr_input);
			if(count($res_news) > 0)
			{
				foreach($res_news as $k => $row)
				{
					$arr_input['nw_item'] = $k + $item + 2;
					db_mod_news($db,$arr_input,$row['nw_id']);
					unset($arr_input);
				}
			}
			$item += 1;
		}
		
		//新增資料
		$arr_input['nw_user'] = $mem_info['name'];
		$arr_input['nw_title'] = $title;
		$arr_input['nw_synopsis'] = $synopsis;
		$arr_input['nw_date'] = date('Y-m-d H:i:s');
		$arr_input['nw_status'] = $status;
		$arr_input['nw_item'] = $item;

		$res = db_add_news($db,$arr_input);
		unset($arr_input);
		
		reload_js_top_href('新增成功','news_sys_content.php?id='.$res);
		exit();
	break;
	
	case 'synopsis_mod':
		$id = ft($_POST['id'],0);
		$title = ft($_POST['title'],1);
		$synopsis = ft($_POST['synopsis'],1);
		$status = ft($_POST['status'],0);
	
		if($title == '')
		{
			post_back('請輸入標題');
			exit();
		}

		$arr_input['nw_title'] = $title;
		$arr_input['nw_synopsis'] = $synopsis;
		$arr_input['nw_update'] = date('Y-m-d H:i:s');
		$arr_input['nw_status'] = $status;

		$res = db_mod_news($db,$arr_input,$id);
		unset($arr_input);
		
		reload_js_top_href('修改成功','news_sys_content1.php?id='.$id);
		exit();
	break;
	
	case 'content_mod':
		$id = ft($_POST['id'],0);
		$top_content = $_POST['top_content'];
		$content = $_POST['content'];
		
		//擷取全部圖片
		// preg_match_all('#<img[^>]*>#i', $content, $match);
		//取得第一張圖
		// preg_match('/upload(.*?)"/i',$match[0][0],$arr_image);
		// $one_images = str_replace('"','',$arr_image[0]);

		// $arr_input['nw_synopsis_image'] = $one_images;
		$arr_input['nw_top_content'] = $top_content;
		$arr_input['nw_content'] = $content;
		$arr_input['nw_update'] = date('Y-m-d H:i:s');

		$res = db_mod_news($db,$arr_input,$id);
		unset($arr_input);
		
		reload_js_top_href('修改成功','news_sys_content2.php?id='.$id);
		exit();
	break;
	
	case 'link_mod':
		$id = ft($_POST['id'],0);
		$content = $_POST['content'];
	
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}

		$arr_input['nw_link'] = $content;
		$arr_input['nw_update'] = date('Y-m-d H:i:s');

		$res = db_mod_news($db,$arr_input,$id);
		unset($arr_input);
		
		reload_js_top_href('修改成功','news_sys_content4.php?id='.$id);
		exit();
	break;
	
	case 'ad_images_add':
		$id = ft($_POST['id'],0);
		$tid = ft($_POST['tid'],0);
		$description = ft($_POST['description'],1);

		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}

		if(isset($_FILES['mypic']))
		{
			foreach($_FILES['mypic']['tmp_name'] as $key => $tmp_name )
			{
				$file_name = $_FILES['mypic']['name'][$key];
				$file_size =$_FILES['mypic']['size'][$key];
				$file_tmp =$_FILES['mypic']['tmp_name'][$key];
				$file_type=$_FILES['mypic']['type'][$key]; 

				$type = strstr($file_name, '.');
				$rand = rand(100, 999);
				$pics = $id.'_'.date('YmdHis') . $rand . $type;

				$pic_path = '../upload/news/'. $pics;
				move_uploaded_file($file_tmp, $pic_path);
				
				$arr_input['na_image'] = $pics;
				if($tid == '')
				{
					$arr_input['na_nwid'] = $id;
					$arr_input['na_description'] = $description;
					db_add_news_ad($db,$arr_input);
				}
			}
		}
		
		if($tid != '')
		{
			$arr_input['na_description'] = $description;
			db_mod_news_ad($db,$arr_input,$tid);
		}
		
		reload_js_top_href('修改成功','news_sys_content.php?id='.$id);
		exit();
	break;
	
	case 'video_add':
		$id = ft($_POST['id'],0);
		$status = ft($_POST['status'],0);
		$video = $_POST['video'];
	
		if($status == '')
		{
			post_back('請選擇來源');
			exit();
		}
		if($video == '')
		{
			post_back('請輸入影片網址');
			exit();
		}

		//新增資料
		$arr_input['nv_nwid'] = $id;
		$arr_input['nv_type'] = $status;
		$arr_input['nv_link'] = $video;

		$res = db_add_news_video($db,$arr_input);
		unset($arr_input);
		
		reload_js_top_href('新增成功','news_sys_content3.php?id='.$id);
		exit();
	break;
	
	case 'del':
		$id = ft($_GET['id'],0);
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}

		$arr_input['nw_del'] = 1;
		$res = db_mod_news($db,$arr_input,$id);
		unset($arr_input);
		
		redirect_js_href('修改成功','news_sys.php');
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
			$arr_input['na_del'] = 1;
			$res = db_mod_news_ad($db,$arr_input,$image_id);
			echo '1';
		}
		else
		{
			echo '刪除失敗.';
		}
		exit;
	break;

	case 'video_del':
		$id = ft($_GET['id'],0);
		$vid = ft($_GET['vid'],0);
		if($vid == '')
		{
			post_back('參數錯誤');
			exit();
		}
		$arr_input['nv_del'] = 1;
		$res = db_mod_news_video($db,$arr_input,$vid);
		
		reload_js_top_href('刪除成功','news_sys_content3.php?id='.$id);
		exit;
	break;
	
	case 'cover_pic':
		$id = $_POST['id'];
		$pic = $_POST['pic'];
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}
		if($pic == '')
		{
			post_back('參數錯誤');
			exit();
		}
		$arr_input['nw_synopsis_image'] = $pic;
		$res = db_mod_news($db,$arr_input,$id);
		exit;
	break;
	
	case 'cover_add':
		$id = ft($_POST['id'],0);

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

			$pic_path = '../upload/news/'. $pics;
			$pic_path_view = 'upload/news/'. $pics;
			move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
			
			$arr_input['nw_synopsis_image'] = $pic_path_view;
			db_mod_news($db,$arr_input,$id);
			unset($arr_input);
		}
		
		reload_js_top_href('上傳成功','news_sys_cover_picture.php?id='.$id);
		exit();
	break;
	
	case 'item_up':
		$item = ft($_GET['item'],0);

		if($item == '')
		{
			post_back('參數錯誤');
			exit();
		}
		
		if($item == 1)
		{
			post_back('已經是最前面了');
			exit();
		}
		$arr_input['item'] = $item;
		$res_now = db_get_news_item($db,$arr_input);
		unset($arr_input);
		
		$arr_input['item'] = $item - 1;
		$res_up = db_get_news_item($db,$arr_input);
		unset($arr_input);

		$arr_input['nw_item'] = $item;
		db_mod_news($db,$arr_input,$res_up['nw_id']);
		unset($arr_input);
		
		$arr_input['nw_item'] = $item - 1;
		db_mod_news($db,$arr_input,$res_now['nw_id']);
		unset($arr_input);
		
		reload_js_top_href('','news_sys.php');
		exit();
	break;
	
	case 'item_down':
		$item = ft($_GET['item'],0);

		if($item == '')
		{
			post_back('參數錯誤');
			exit();
		}
		
		$item_end = db_get_news_item_end($db);
		if($item == $item_end['nw_item'])
		{
			post_back('已經是最後面了');
			exit();
		}
		$arr_input['item'] = $item;
		$res_now = db_get_news_item($db,$arr_input);
		unset($arr_input);
		
		$arr_input['item'] = $item + 1;
		$res_up = db_get_news_item($db,$arr_input);
		unset($arr_input);

		$arr_input['nw_item'] = $item;
		db_mod_news($db,$arr_input,$res_up['nw_id']);
		unset($arr_input);
		
		$arr_input['nw_item'] = $item + 1;
		db_mod_news($db,$arr_input,$res_now['nw_id']);
		unset($arr_input);
		
		reload_js_top_href('','news_sys.php');
		exit();
	break;
	
	default:
		post_back('參數錯誤');
		exit();
	break;
}
?>