<?php

// Directories, where classes are, and need to autoload
$include_path_array = array(
	'../core/base', // Core classes
	'../model', // Web model classes
	'../controller', // Web controller classes
	'../core/extra', // Additional classes, e.g.: Doctrine, and your own classes
); 
// Save class directories 
foreach ((array)$include_path_array as $path) {
	set_include_path(get_include_path().PATH_SEPARATOR.$path);
}


// Framework directory
define('BASE_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..');
define('HTML_PATH', preg_replace("/^(\/[a-zA-Z0-9_-]+){0,1}\/public\/.*$/", "$1", $_SERVER['SCRIPT_NAME']));


// Load helper functions
foreach ((array)$helpers as $helper) {
	include BASE_PATH.'/helper/'.$helper.'Helper.php';	
}


// Database provider
if (DB_REQUIRE) {
	include BASE_PATH.'/core/base/database.php';
	_db_setup();
}


// SESSION START
session_start();


/**
 * Setup auto class loader
 * Every class ha to be named after it'c content class,
 * e.g.: Street.php has only one class: class Street{}
 *
 * @param String $object string representation
 */
function __autoload($object) {
	global $include_path_array;
	
	$file_exists = false;
	
	foreach ((array)$include_path_array as $path) {
		if (file_exists($path.DIRECTORY_SEPARATOR.$object.'.php')) {
			$file_exists = true;
		}
	}
			
	if (!$file_exists) {
		throw new Exception("Class file not found exception.");
	}

	require_once $object.'.php';
}

?>
