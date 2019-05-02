<?php
	class StringManipulate {
		public static function reverseIt($string) {
			return "<b>Reverse:</b> ".strrev($string);
		}
		public static function lengthCheck($string) {
			return "<b>Length:</b> ".strlen($string);
		}
		public static function toUpperCase($string) {
			return "<b>Upper Case:</b> ".strtoupper($string);
		}
	}

	if (isset($_POST['ManipulateIt'])) {
		echo StringManipulate::reverseIt($_POST['string']).'</br>'.stringManipulate::lengthCheck($_POST['string']).'</br>'.stringManipulate::toUpperCase($_POST['string']);
	} else 
		echo 'Request failed';
?>