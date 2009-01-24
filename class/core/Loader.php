<?php
/**
 * Loader class
 * 
 * Present a singleton factory
 *
 */
class Loader {
	 private static $objects; // Loaded class instances
	 
	 /**
	  * Create one instance from each class
	  *
	  * @param string $object Class name
	  * @return Object instance
	  */
	 public static function load($object) {
	 	$valid_o = array(
	 		'Router',
	 		'Template',
	 		'MySqlDB'
	 	);
	 	
	 	if (in_array($object, $valid_o)) {
	 		if (empty(Loader::$objects[$object])) {
	 			Loader::$objects[$object] = new $object();
	 		}
	 		
	 		return Loader::$objects[$object];
	 	}
	 }
}
?>