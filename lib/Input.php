<?php 
class Input {
	function post ($name , $filter = true){
		if (array_key_exists($name, $_POST) == true) {
			$value =  $_POST[$name];
                        if ($filter == true){
                            $value = strip_tags($value);
                        }
		}else {
			$value = null;
		}
		return $value;
	}
	function get($name){
		if (array_key_exists($name, $_GET) == true) {
			$value = $_GET[$name];
		}else {
			$value = null;
		}
		return strip_tags($value);
	}
	function session($name){
		if (array_key_exists($name, $_SESSION) == true) {
			$value = $_SESSION[$name];
		}else {
			$value = null;
		}
		return strip_tags($value);
	}
        function cookie($name){
		if (array_key_exists($name, $_COOKIE) == true) {
			$value = $_COOKIE[$name];
		}else {
			$value = null;
		}
		return strip_tags($value);
	}
}

