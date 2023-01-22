<?php

class Controller
{

	protected function view($view, $model = []){
		if(file_exists('app/views/' . $view . '.php')){
			//not sure about _once here...
			require 'app/views/' . $view . '.php';
		}
		else
			echo "Can't load view $view: file not found!";
	}

	public static function model($model){
		if(file_exists('app/models/' . $model . '.php')){
			require_once 'app/models/' . $model . '.php';
			return new $model();
		}else 
			return null;//could also return new stdClass();
	}

	function crypto_rand_secure($min, $max) {
		$range = $max - $min;
		if ($range < 0) return $min; // not so random...
		$log = log($range, 2);
		$bytes = (int) ($log / 8) + 1; // length in bytes
		$bits = (int) $log + 1; // length in bits
		$filter = (int) (1 << $bits) - 1; // set all lower bits to 1
		do {
			$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
			$rnd = $rnd & $filter; // discard irrelevant bits
		} while ($rnd >= $range);
		return $min + $rnd;
	}
	
	function getToken($length=56){
		$token = "";
		$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
		$codeAlphabet.= "0123456789";
		for($i=0;$i<$length;$i++){
			$token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
		}
		return $token;
	}

}
?>