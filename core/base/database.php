<?php
/**
 * Thin database layer
 * Supported database types: MySQL
 */

switch (DB_TYPE) {
case 'mysql':
	require BASE_PATH.'/core/db_drivers/_mysql.driver.php';
	break;
}


function _db_setup() {
	_db_open(DB_HOST, DB_USER, DB_PASS);
	db_change_db(DB_NAME);
}

function _db_open($host, $user, $pass) {
	switch (DB_TYPE) {
	case 'mysql':
		_mysql_connection($host, $user, $pass);
		break;
	default:
		return new Error('Missing database type.');
		break;
	}
}

function _db_close() {
}

function db_query($query) {
	$query = trim($query);

	switch (DB_TYPE) {
	case 'mysql':
		return _mysql_query($query);
	}
}

function db_affected_rows() {
}

function db_change_db($database) {
	switch (DB_TYPE) {
	case 'mysql':
		_mysql_change_db($database);
		break;
	}
}

function db_last_id() {
}

?>
