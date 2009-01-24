<?php
/**
 * Loader class
 * 
 * Present a singleton factory
 */
class Loader {
	/**
	 * Singleton instance container
	 *
	 * @var Array
	 */
	private static $objects; // Loaded class instances
	 
	 /**
	  * Create one instance from each class
	  *
	  * @param string $object Class name
	  * @return Object instance
	  */
	public static function load($object) {
 		if (empty(Loader::$objects[$object])) {
 			Loader::$objects[$object] = new $object();
 		}
 		
 		return Loader::$objects[$object];
	}
}
?>