<?php
/**
 * MySQL helper collection
 */

function _mysql_connection() {
	list($host, $user, $passwd) = func_get_args();

	static $conn = NULL;
	if (empty($conn) && func_num_args()) {
		$conn = mysql_connect($host, $user, $passwd);
		if (!$conn) {
			exit('Database error: '.mysql_error());
		}
	}
	
	return $conn;
}

function _mysql_change_db($database) {
	$conn = _mysql_connection();
	if (!mysql_selectdb($database, $conn)) {
		return new Error('Error during database changing.');
	}

	return new Success();
}

function _mysql_query($query) {
	$conn = _mysql_connection();
	$resource = mysql_query($query);
	if (!$resource) {
		new Error('['.mysql_errno($conn).'] Database query error: '.mysql_error($conn));
	}

	if (preg_match("/^select/i", $query)) {
		$result = array();
		while ($row = mysql_fetch_object($resource)) {
			$result[] = $row;
		}
		mysql_free_result($conn);
		return $result;
	} else if (preg_match("/insert/i", $query)) {
		return mysql_insert_id($conn);
	} else if (preg_match("/^(update|delete)/i", $query)) {
		return mysql_affected_rows($conn);
	}
}


?>