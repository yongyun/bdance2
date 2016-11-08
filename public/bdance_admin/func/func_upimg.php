<?php

function upload_img($file_size_max,$accept_overwrite,$upload_file1,$upload_file_name1,$thumb_w,$thumb_h,$pname)
{
	//require_once('ftp.php');
	//ini_set('display_errors','On');
	
	//預設值
	if(empty($thumb_w)) $thumb_w=417;	
	if(empty($thumb_h)) $thumb_h=276;
	
	//原始文件大小
	$oir_file_size = filesize($upload_file1);
	//清filesize 的緩存
	clearstatcache();
	$upload_file_size = $oir_file_size;
	
	//原文件名
	$oir_file_name = $upload_file_name1;

  	//取得檔名
	$array = explode(".",$upload_file_name1);
	if(count($array)<=1)
	{
		echo '<script>alert("上傳格式不符,沒有副檔名");</script>';
		return false;
	}
	
	//副檔名
	$hzm = strtolower($array[count($array)-1]);
	if($hzm == 'jpeg')
	{
		$hzm ='jpg';
	}

	if($hzm !='jpg' && $hzm != 'JPG' && $hzm !='gif' && $hzm !='GIF')
	{
		
		echo '<script>alert("上傳圖片格式不符,只能是jpg、gif");</script>';
		return false;
		
	}	
	
	if($hzm =='jpg' || $hzm =='JPG')
	{
		//echo 1;
		//若是jpg圖形會產生一個新圖形，若不是會產生空字串
		$src = imagecreatefromjpeg($upload_file1);
		
		$hzm_n = 'jpg';
	}
	elseif($hzm =='gif' || $hzm =='GIF')
	{
		//echo 2;
		//若是png圖形會產生一個新圖形，若不是會產生空字串
	  	$src = imagecreatefromgif($upload_file1);
		
		$hzm_n = 'gif';
	}
	else
	{
		//echo 3;
		$src = imagecreatefrompng($upload_file1);
		
		$hzm_n = 'jpg';
	}
	//var_dump($src);exit();
	if(!$src)
	{
		
		echo '<script>alert("上傳圖片失敗-非圖片檔案");</script>';
		return false;
		
	}	

	if($upload_file_size > $file_size_max)
	{

		echo '<script>alert("對不起，你的容量大於規定");</script>';
		return false;		
		
	}	
	
	// 取得來源圖片長寬	
	$src_w = imagesx($src);
	$src_h = imagesy($src);
	
	if($thumb_w > $src_w && $thumb_h > $src_h)
	{
		$thumb_w = $src_w;
		$thumb_h = $src_h;
	}

	if($thumb_w==1)
	{
		//$thumb_w = $src_w;
		if($thumb_h < $src_h)
		$thumb_w = intval(($src_w / $src_h) * $thumb_h);
		else
		{
			$thumb_h = $src_h;
			$thumb_w = $src_w;
		}
	}
	
	if($thumb_h==1)
	{
		//$thumb_h = $src_h;
		if($thumb_w < $src_w)
		$thumb_h = intval(($src_h / $src_w) * $thumb_w);
		else
		{
			$thumb_h = $src_h;
			$thumb_w = $src_w;
		}
	}
	
	// 建立縮圖
	$thumb = imagecreatetruecolor($thumb_w, $thumb_h);

	// 開始縮圖
	$thumb_r = imagecopyresampled($thumb, $src, 0, 0, 0, 0, $thumb_w, $thumb_h, $src_w, $src_h);

	if(!$thumb_r)
	{

		echo '<script>alert("上傳圖片失敗-非圖片檔案-縮圖失敗");</script>';
		return false;		
		
	}	
	$mt = explode(" ",microtime());	
	$date=$pname.'_'.date('YmdHis');
	$upload_file_name1=$date.".".$hzm;
	
	// 儲存縮圖到指定目錄
	if($hzm =='jpg')
	{  
		$upok = imagejpeg($thumb, "goods_images/".$upload_file_name1,100);
	}
	else
	{
		//gif 使用 imagegif 會變成純圖片不會有動態效果
		//$upok = imagegif($src, "goods_images/".$upload_file_name1);
		$upok = move_uploaded_file($upload_file1,"goods_images/".$upload_file_name1);
	}
	
	$size = getimagesize("goods_images/".$upload_file_name1); 
	
	if($size['mime'] != 'image/gif' && $size['mime'] != 'image/jpeg' && $size['mime'] != 'image/jpg')
	{
		mail("stanley@myday.com.tw", "my85_pic_err", "路徑 : "."goods_images/".$upload_file_name1." \n 會員 : ".ft($_COOKIE['su_acc'],1)." \n 網址 : ".get_current_page()." \n 時間 : ".date('Y-m-d H:i:s')." \n IP : ".sys_get_ip());
		mail("smallya7709@gmail.com", "my85_pic_err", "路徑 : "."goods_images/".$upload_file_name1." \n 會員 : ".ft($_COOKIE['su_acc'],1)." \n 網址 : ".get_current_page()." \n 時間 : ".date('Y-m-d H:i:s')." \n IP : ".sys_get_ip());
	}

	if(!$upok)
	{
		echo '<script>alert("上傳圖片失敗-權限問題");</script>';	
		return false;
	}
		
	//傳送至主機

	/*if(!ftp_sendfile_syn($upload_file_name1))
	{
		echo '<script>alert("上傳圖片失敗-ftp問題");</script>';
		return false;
	}*/

	/*
	if(!sendfile($upload_file_name1))
	{
		echo '<script>alert("上傳圖片失敗-scp問題");</script>';
		return false;
	}
	*/
	return $upload_file_name1;
}
//實名認證或點數卡憑證收據圖片上傳
function idc_upload_img($file_size_max,$accept_overwrite,$upload_file1,$upload_file_name1,$thumb_w,$thumb_h,$pname,$dname)
{
	//require_once('ftp.php');
	//ini_set('display_errors','On');
	
	//預設值
	if(empty($thumb_w)) $thumb_w=417;	
	if(empty($thumb_h)) $thumb_h=276;
	
  	//取得檔名
	$array = explode(".",$upload_file_name1);
	if(count($array)<=1)
	{
		echo '<script>alert("上傳格式不符,沒有副檔名");</script>';
		return false;
	}
	
	//副檔名
	$hzm = strtolower($array[count($array)-1]);
	
	if($hzm !='jpg' && $hzm != 'JPG' && $hzm !='png' && $hzm !='PNG' && $hzm !='gif' && $hzm !='GIF')
	{
		
		echo '<script>alert("上傳圖片格式不符,只能是jpg、png、gif");</script>';
		return false;
		
	}	
	
	if($hzm =='jpg' || $hzm =='JPG')
	{
		//echo 1;
		$src = imagecreatefromjpeg($upload_file1);
	}
	elseif($hzm =='gif' || $hzm =='GIF')
	{
		//echo 2;
	  	$src = imagecreatefromgif($upload_file1);
	}
	else
	{
		//echo 3;
		$src = imagecreatefrompng($upload_file1);
	}
	//var_dump($src);exit();
	if(!$src)
	{
		
		echo '<script>alert("上傳圖片失敗-非圖片檔案");</script>';
		return false;
		
	}	

	if($upload_file_size > $file_size_max)
	{

		echo '<script>alert("對不起，你的容量大於規定");</script>';
		return false;		
		
	}	
	
	// 取得來源圖片長寬	
	$src_w = imagesx($src);
	$src_h = imagesy($src);
	
	if($thumb_w > $src_w && $thumb_h > $src_h)
	{
		$thumb_w = $src_w;
		$thumb_h = $src_h;
	}

	if($thumb_w==1)
	{
		//$thumb_w = $src_w;
		if($thumb_h < $src_h)
		$thumb_w = intval(($src_w / $src_h) * $thumb_h);
		else
		{
			$thumb_h = $src_h;
			$thumb_w = $src_w;
		}
	}
	
	if($thumb_h==1)
	{
		//$thumb_h = $src_h;
		if($thumb_w < $src_w)
		$thumb_h = intval(($src_h / $src_w) * $thumb_w);
		else
		{
			$thumb_h = $src_h;
			$thumb_w = $src_w;
		}
	}	
	
	// 建立縮圖
	$thumb = imagecreatetruecolor($thumb_w, $thumb_h);

	// 開始縮圖
	$thumb_r = imagecopyresampled($thumb, $src, 0, 0, 0, 0, $thumb_w, $thumb_h, $src_w, $src_h);

	if(!$thumb_r)
	{

		echo '<script>alert("上傳圖片失敗-非圖片檔案-縮圖失敗");</script>';
		return false;		
		
	}	
	$mt = explode(" ",microtime());	
	//加上日期
	if($dname == 'date')
	{
		$date='_'.date('YmdHis');	
	}
	$upload_file_name1=$pname.$date.".".$hzm;
	
	// 儲存縮圖到指定目錄
	if($hzm =='jpg')
	{  
		$upok = imagejpeg($thumb, "my85_admin/upload_pic/".$upload_file_name1,100);
	}
	else
		//$upok = imagegif($src, "goods_images/".$upload_file_name1,100);
		$upok = move_uploaded_file($upload_file1,"my85_admin/upload_pic/".$upload_file_name1);
	
	if(!$upok)
	{
		echo '<script>alert("上傳圖片失敗-權限問題");</script>';	
		return false;
	}
		
	//傳送至主機

	/*if(!ftp_sendfile_syn($upload_file_name1))
	{
		echo '<script>alert("上傳圖片失敗-ftp問題");</script>';
		return false;
	}*/

	/*
	if(!sendfile($upload_file_name1))
	{
		echo '<script>alert("上傳圖片失敗-scp問題");</script>';
		return false;
	}
	*/
	return $upload_file_name1;
}
?>