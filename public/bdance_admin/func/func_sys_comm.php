<?php
//==================
//	session初始化 - 開啟session記錄
//==================
function start_auth()
{
	if( AUTH_METHOD == AUTH_METHOD_SESSION )
	{
		session_start();
	}
}
//==================
//	存入使用者認證的資料 $key為auth[ 索引值 ]、value為auth[$key]對應的資料
//==================
function set_auth_data($key, $value)
{
	if( AUTH_METHOD == AUTH_METHOD_COOKIE )	//if如果使用cookie就存入cookie
		setcookie("auth[$key]", $value);
	else
		$_SESSION["auth[$key]"] = $value;	//else就設定session就存入session
}
//==================
//	取得auth[$key]資料，$key為索引值
//==================
function get_auth_data($key)
{
	if( AUTH_METHOD == AUTH_METHOD_COOKIE )
	{
		if( empty($_SESSION["auth[$key]"]) ) return null;
		return $_SESSION["auth[$key]"];
	}
	else
	{
		if( empty($_SESSION["auth[$key]"]) ) return null;

		return $_SESSION["auth[$key]"];
	}
}
//==================
//	刪除auth[$key]裡的資料
//==================
function del_auth_data($key)
{
	if( AUTH_METHOD == AUTH_METHOD_COOKIE )
	{
		setcookie("auth[$key]", "", time() - 60 * 60 * 24 * 7);
		setcookie($key, '', time() - 60 * 60 * 24 * 7);
	}
	else
	{
		unset($_SESSION["auth[$key]"]);
		unset($_SESSION[$key]);
	}
}
//==================
// 重新讀取頁面，避免refresh，重新送出
//==================
function redirect_location_page($page)
{
	$location_page = $page;
	//$page_uri      = getenv("REQUEST_URI'");
	//var_dump($location_page);
	//var_dump($page_uri);
	//exit();
	if($location_page)
	{
		header("Location:$location_page".$page_uri);
	}		
}
//==================
// alert控制
//==================
function js_alert($msg)
{
	echo '<script>alert("'.$msg.'");</script>';
} 

//==================
// 錯誤控制
//==================
function post_back($postmsg)
{
	echo '<script>alert("'.$postmsg.'");history.back();</script>';
} 
//==================
//輸出
//==================
function html_out($str)
{
  $search  = array ('<','>',' ',"\r\n");
  $replace = array ('&lt;','&gt;',' &nbsp;',"<br>\r\n");
  return str_replace($search,$replace,$str);
}
//==================
//js 轉址
//==================
function redirect_js_href($msg,$url)
{
	if($url == NULL)
	{
		$url = 'index.php';	
	}
	
	echo '<script>';
	if($msg)
	{
		echo "alert('".$msg."');";
	}
	echo 'window.location.href="'.$url.'";';
	echo '</script>';
}
//==================
//js 回上X頁
//==================
function redirect_js_back($msg,$num)
{
	if($num== NULL)
	{
		$url = '1';	
	}
	
	echo '<script>';
	if($msg)
	{
		echo "alert('".$msg."');";
	}
	echo 'window.history.go("-'.$num.'");';
	echo '</script>';
}



//==================
//js 重新整理最上層頁面
//==================
function reload_js_top($msg,$content=true)
{
	if($content)
	{
		echo '系統轉換頁面中...';
		/*echo '<div id="loadding" style="width:20px; float:left;"><img src="img/ajax-loader.gif"></div><div style="width:200px; float:left;">系統轉換頁面中...</div>';
		echo '<script>document.getElementById("loadding").innerHTML="'."<img src='img/ajax-loader.gif'>".'";</script>';*/
	}
	echo '<script>';
	if($msg)
	{
		echo "alert('".$msg."');";
	}
	echo 'parent.location.reload(true);';
	echo '</script>';	
}

//==================
//js 轉址最上層頁面
//==================
function reload_js_top_href($msg,$href)
{
	echo '<script>';
	if($msg)
	{
		echo "alert('".$msg."');";
	}
	echo 'parent.window.location="'.$href.'";';
	echo '</script>';	
}

//==================
//js confirm 確認視窗
//==================
function confirm_page($msg,$url)
{
	echo '<script>';
	echo 'if (confirm("'.$msg.'") )';
	echo '{';
		echo 'window.top.location.href="'.$url.'";';
	echo '}';
	echo '</script>';
}
//==================
//php 字串過濾
//==================
function ft($input, $class = 1)
{
	switch($class)
	{
		#數字過濾
		case 0:
			if(is_numeric($input) == false && $input != '')
			{
				exit('數字格式錯誤');
			}
		break;
		
		#字串過濾
		case 1:
			if(isset($input))
			{
		    	$input = strip_tags(trim($input));
			}
		break;
		
		//html
		case 2:
		
			require('HTMLPurifier/HTMLPurifier.auto.php');

			// 更改預設值
			$config = HTMLPurifier_Config::createDefault();
			 
			// 選擇允許的 HTML Tags, 除了 以下的 Tags[Attributes], 其他的一律都會被過濾掉
			$config->set('HTML', 'Allowed', 'p,br,strong,em,u,span[style],a[href|target],img');
			$config->set('HTML', 'AllowedElements', 'ol,ul,li,table,td,tr,thead,tbody,th,tfoot,font,u,strong,a,img,p,br,span,h1,h2,h3,h4,h5,h6');
			$config->set('Attr', 'AllowedFrameTargets', '_blank, _self');
			// 將 $config 帶入 object 
			$purifier = new HTMLPurifier($config);

			return $purifier->purify($input);
		break;
		
		default:
		    if(isset($input))
			{
		    	$input = strip_tags(trim($input));
			}
		break;
	}
		
   	return $input; 
}

//==================
//php 陣列字串過濾
//==================
function ft_arr($arr_input, $class = 1)
{
	foreach($arr_input as $key =>$input)
	{
		$arr_val[$key] = ft($input, $class);
	}
	return $arr_val;
}


//==================
// 密碼加密
//==================
function eliteEncrypt($string,$i_salt) 
{ 
    // Create salt 
    $salt = md5($string.SYS_COOKEY1.$i_salt); 
    
    // Hash
    $string = md5($salt.$string.$salt); 
    return $string; 
}


//==================
//頁面GET參數取得處理
//str 為陣列
//==================
function get_Url($str)
{
	 $i=0;
	foreach ($_GET as $varname => $varvalue)
   	{
		if($uri == NULL)
		{
			$uri = '?';	
		}
		
		
		
    	$varvalue = ft($varvalue,1);
		$varname = ft($varname,1);
  		if ((!empty($varvalue)))
		{

			
			if(count($str)>0)
			{
				
				$vn_flag=0;
				foreach($str as $s)
				{
					if($varname == $s)
					{
						
						$vn_flag=1;
					}
				}
	
				if($vn_flag==0)
				{
					if($i>0)
					{
						$uri .= '&';	
					}
					$uri .= $varname.'='.$varvalue;	
				}
			}
			else
			{
				if($i>0)
				{
					$uri .= '&';	
				}
				$uri .= $varname.'='.$varvalue;	
			}
		}
      	$i++;
     }
	 if($uri != '')
	 {
	 	return $uri.'&';
	 }
	 else
	 {
		 return '?';
	 }
}


//==================
//回上一頁，紀錄get參數 for 後臺用
//==================
function rtn_prev_page()
{
	return ft($_SERVER["HTTP_REFERER"],1);		
}

//==================
//頁面GET參數取得處理 for login
//==================
function get_url_login()
{
	 
	foreach ($_GET as $varname => $varvalue)
   	{
    	$varvalue = ft($varvalue,1);
		$varname = ft($varname,1);
  		if ((!empty($varvalue)) && (strtolower($varname) != 'act'))
		{	
			if($uri)
			{
				$uri .= '&';		
			}
			$uri .= $varname.'='.$varvalue;
		}	
      
     }
	 return '?'.$uri;
  		
  
 
}
//==================
//取得現在頁面
//==================
function get_current_page()
{
	$url = 'http://'.getenv("SERVER_NAME").getenv("REQUEST_URI");
	return ($url);	
}

//====================================
//取得縮圖檔名
// @img_name = 圖片名稱
//====================================
function get_thumb_img_name($img_name)
{
	if($img_name != NULL)
	{
		$pic_tmp = explode('.jpg',$img_name);
		$r_pic = $pic_tmp[0].'_s'.'.jpg';
		if(file_exists($r_pic))
		{
			return $r_pic;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;	
	}
	
}
//====================================
//取得縮圖尺寸
// @img_name = 圖片名稱
//$img['tmp_w'] = 80; 小圖寬度
//$img['tmp_h'] = 90; 小圖高度
//$img['tmp_w_lag'] = 230; 大圖寬度
//$img['tmp_h_lag'] = 270; 大圖高度
//====================================
function get_thumb_size($img_name)
{
	if($img_name == NULL)
	{
		return false;
	}
	
	list($src_w, $src_h, $type, $attr) = getimagesize($img_name);
	
	if($src_w == NULL)
	{
		return false;
	}
	if($src_w < $src_h)
	{
		$img['tmp_w'] = 80;
		$img['tmp_h'] = 90;
		$img['tmp_w_lag'] = 230;
		$img['tmp_h_lag'] = 270;
	}
	else
	{
		$img['tmp_w'] = 120;
		$img['tmp_h'] = 90;
		$img['tmp_w_lag'] = 360;
		$img['tmp_h_lag'] = 270;
	}
	return $img;
}
//==================
//中文切割字串
// @str   = 需要切割的字串
// @len   = 達到多少字元以後才需要切割，預設是127個字元
// @style = 如果有切割字串以後，後面的樣式 如: 字串...， ...就是樣式 
//==================
function utf_substr($str, $len = 127, $style = NULL)
{
	$strlen = mb_strlen($str, 'UTF-8');
	
	if($strlen > $len)
	{
		$str = mb_substr($str, 0, $len, 'UTF-8').$style;
	}
	
	return $str;
}

/**
* @version $Id: str_split.php 10381 2008-06-01 03:35:53Z pasamio $
* @package utf8
* @subpackage strings
*/
function utf8_str_split($str, $split_len = 1)
{
    if (!preg_match('/^[0-9]+$/', $split_len) || $split_len < 1)
        return FALSE;
 
    $len = mb_strlen($str, 'UTF-8');
    if ($len <= $split_len)
        return array($str);
 
    preg_match_all('/.{'.$split_len.'}|[^\x00]{1,'.$split_len.'}$/us', $str, $ar);
 
    return $ar[0];
}

//==================
//取得限制頁面數量 
//==================
function get_page_limit($page)
{
	//var_dump($page);
	if(count($page) > 0)
	{
		if($page['page_id'] == NULL || $page['page_id'] == 1)
		{
			$sql = " limit 0,".$page['page_limit'];
		}
		else
		{
			$sql = " limit ".(($page['page_id']-1)*$page['page_limit']).','.$page['page_limit'];
		}
		return $sql;
	}
	else
	{
		return false;
	}
	
}

//==================
//印出html選取狀態
//==================
function echo_html_seleted($value,$current)
{
	if($value == $current)
	{
		echo 'selected="selected"';
	}
}


function echo_html_checked($value,$current)
{
	if($value == $current)
	{
		echo 'checked="checked"';
	}
}

function echo_html_active($value,$current)
{
	if($value == $current)
	{
		echo 'class="active"';
	}
}

//亂數產生密碼
function rand_password()
{     
    $len     = 8; //加入8個含數字亂碼
    $randoma = '';

    $word = '123456789';
    $lens = strlen($word);//取得字元長度

    for ($i = 0; $i < $len; $i++) 
	{
        $randoma .= $word[rand() % $lens];
    }
	
	return $randoma;
}

function make_random($length = 8) 
{
	if(is_numeric($length) && $length >0)
	{
		$chr = array_merge(range('A', 'Z'), range('a', 'z'),range(0, 9));
		$out ='';
		for($i = 0;$i < $length;$i++) 
		{
			$out .= $chr[mt_rand(0,count($chr) - 1)];
		}
		return $out;
	}
}
//debug 專用
//檢視陣列輸出
function debug_arr($arr)
{
	echo '<pre>';
	var_dump($arr);
	echo '</pre>';
}



//取得使用者IP
function get_ip()
{
	if (getenv('HTTP_CLIENT_IP')) 
	{
		$ip = getenv('HTTP_CLIENT_IP');
	} 
	
	else if (getenv('HTTP_X_FORWARDED_FOR')) 
	{
		$ip = getenv('HTTP_X_FORWARDED_FOR');
	}
	
	else if (getenv('REMOTE_ADDR')) 
	{
		$ip = getenv('REMOTE_ADDR');
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	
	return $ip;	
}

//==================
//還原訂單編號
//==================
function revert_id($o_id)
{
	$ori_id = substr($o_id,1);
	return (int)$ori_id;
}

//==================
//PRINT
//==================
function pre($val)
{
	echo '<pre>';
	print_r($val);
	echo '</pre><br />';
}


?>