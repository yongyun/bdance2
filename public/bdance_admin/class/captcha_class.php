<?php 
/*************************************
 *    產生驗證碼
 *    @font       = 字型檔位置
 *    @privatekey = 一組固定安全密匙
 */
 
class Captcha 
{
	public function creatrCaptcha($font)
	{
		ob_start();
		session_start();
		
		$im         = imagecreate(155, 30); 
		$background = imagecolorallocate($im, 255, 255, 255);
		
		$str = "0123456789abcdefghijklmipxyz";
		
		$linecolor = imagecolorallocate($im, 210, 210, 210);
		
		for($i<1; $i<=20; $i++) 
		{
			if($i == 10) 
			{ 
				$x = $i * 10 - 1; 
			} else { 
				$x = $i * 10; 
			}
			
			imageline($im , $x, 0, $x, 30, $linecolor);#直線
			
			if($i <= 3) 
			{
				if($i == 3) 
				{ 
					$y = $i * 10 - 1; 
				} else { 
					$y = $i * 10; 
				}
				
				imageline($im, 0 , $y, 150, $y, $linecolor);#橫線
			}
		}
		
		$x=15;
		
		for($i=0; $i<6; $i++)
		{
			do 
			{
				$s[$i] = $str{rand(0, strlen($str))};
			} while(!$s[$i]);
			$color = imagecolorallocate($im, rand(0, 160), rand(0, 160), rand(0, 160));
			imagettftext($im, 18, rand(-45, 45), $x, 23, $color, $font, $s[$i]);
			$x += 20;
		}
		
		$_SESSION['recaptcha_challenge_field'] = implode("", $s);
		
		header("Content-type: image/png"); 
		imagepng($im); 
		imagedestroy($im); 
		ob_end_flush();		
	}
	
	public function checkCaptcha()
	{
		$check_privatekey = '6LfiUMASAAAAAHLz53Ryjc8xH01uW_XdEvuz8h8j';
		
		if($this->privatekey == $check_privatekey)
		{
			if($this->recaptcha_response_field != $_SESSION['recaptcha_challenge_field'])
			{
				return 'error';
			}
		}
	}
}
?>