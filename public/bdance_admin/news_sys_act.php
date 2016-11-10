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
	
		if($title == '')
		{
			post_back('請輸入標題');
			exit();
		}
		if($synopsis == '')
		{
			post_back('請輸入簡述內容');
			exit();
		}

		//新增資料
		$arr_input['nw_user'] = $mem_info['name'];
		$arr_input['nw_title'] = $title;
		$arr_input['nw_synopsis'] = $synopsis;
		$arr_input['nw_date'] = date('Y-m-d H:i:s');
		$arr_input['nw_status'] = $status;

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
		if($synopsis == '')
		{
			post_back('請輸入簡述內容');
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
	
		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}
		
		//擷取全部圖片
		preg_match_all('#<img[^>]*>#i', $content, $match);

		$arr_input['nw_synopsis_image'] = $match[0][0];
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
		$description = ft($_POST['description'],1);

		if($id == '')
		{
			post_back('參數錯誤');
			exit();
		}

		if($description == '')
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
			move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
			
			$arr_input['na_nwid'] = $id;
			$arr_input['na_image'] = $pics;
			$arr_input['na_description'] = $description;
			db_add_news_ad($db,$arr_input);
			unset($arr_input);
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
			$res = db_mod_news($db,$arr_input,$image_id);
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
		$res = db_mod_news_video($db,$arr_input,$id);
		
		reload_js_top_href('新增成功','news_sys_content3.php?id='.$id);
		exit;
	break;
	
	default:
		post_back('參數錯誤');
		exit();
	break;
}
?>