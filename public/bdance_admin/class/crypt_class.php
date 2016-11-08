<?php 

class phpcrypt
{ 
	function __construct() 
	{ 
		// $this->keys = md5(getenv("cap_key")); 
		// $this->iv = md5(getenv("cap_iv"));
		$this->keys = 'NUIuHEN2v1sdonTsENw8ThlG'; 
		$this->iv = 'jo1SfNxo';
	} 

	private static function getKey(){
		return md5('CheneyKey');
	}
	
	public function encrypt($value) 
	{ 
		$td = mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_CBC, ''); 
		// $iv = base64_encode($this->iv);
		// $key = base64_encode($this->keys); 
		$iv = $this->iv;
		$key = $this->keys; 
		// $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_RANDOM);
		// $key = substr(self::getKey(), 0, mcrypt_enc_get_key_size($td));
		mcrypt_generic_init($td, $key, $iv); 		
		$value = $this->PaddingPKCS7($value);		
		$ret = base64_encode(mcrypt_generic($td, $value)); 
		mcrypt_generic_deinit($td); 
		mcrypt_module_close($td);		
		return $ret; 
	} 


	public function dencrypt($value) 
	{
		$td = mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_CBC, ''); 
		// $iv = base64_encode($this->iv);
		// $key = base64_encode($this->keys); 
		$iv = $this->iv;
		$key = $this->keys; 
		// $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_RANDOM);
		// $key = substr(self::getKey(), 0, mcrypt_enc_get_key_size($td));
		mcrypt_generic_init($td, $key, $iv); 
		$ret = mdecrypt_generic($td, base64_decode($value)); 
		$ret = $this->UnPaddingPKCS7($ret); 
		mcrypt_generic_deinit($td); 
		mcrypt_module_close($td); 
		return $ret; 
	} 

	private function PaddingPKCS7 ($data) 
	{ 
		$block_size = mcrypt_get_block_size('tripledes', 'cbc'); 
		$padding_char = $block_size - (strlen($data) % $block_size); 
		$data .= str_repeat(chr($padding_char), $padding_char); 
		return $data; 
	} 

	private function UnPaddingPKCS7 ($text) 
	{ 
		$pad = ord($text{strlen($text) - 1}); 
		
		if ($pad > strlen($text))  
			return false; 

		if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) 
			return false; 
			
		return substr($text, 0, - 1 * $pad); 
	} 
} 



?>