<?php


define('DATE_TIME_HU', 1);
define('DATE_HU', 2);
define('DATE_SQL', 3);

function dateTo($date, $date_type) {
	if (empty($date)) {
		return '';
	}
	
	$time = strtotime($date);
	
	switch ($date_type) {
		case DATE_HU:
			return date('Y. M. d.', $time);
			break;
		case DATE_TIME_HU:
			return date('Y. M. d., G:i', $time);
			break;
		default :
			return date('Y-m-d', $time);
			break;
	}
}

function isEmail($email) {
	if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)) {
		return TRUE;
	}
	
	return FALSE;
}

function saltedPassword($password, $salt) {
	return crypt($password, $salt);
}

function getSalt($length=8) {
	$misc = '0123456789abcdefghijklmnopqrstuvwxyz';
	$salt = '';
	for ($i = 0; $i < $length; $i++) {
		$salt .= $misc[rand(0, strlen($misc) - 1)];
	}
	
	return $salt;
}

function dump($e) {
	echo '<pre>';
	var_dump($e);
	echo '</pre>';
}

?>