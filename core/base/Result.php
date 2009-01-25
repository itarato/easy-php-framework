<?php

/**
 * Universal return format
 * Usage:
 * 	function foo() {
 * 		bar;
 * 		if ($taz) {
 * 			// Something failed
 * 			return new Result(FALSE, 'Error message');
 * 		}
 * 
 * 		// Success
 * 		return new Result(TRUE, 'Hourray!');
 *  }
 */
class Result {
	/**
	 * Result status
	 *
	 * @var Boolean
	 */
	public $ok;
	/**
	 * Return message
	 * 
	 * @var String
	 */
	/**
	 * Message
	 *
	 * @var String
	 */
	public $message;
	/**
	 * Additional data fields
	 *
	 * @var Array
	 */
	public $data;
	
	/**
	 * Constructor
	 */
	public function __construct($ok=TRUE, $message=NULL, $data=NULL) {
		$this->ok = $ok;
		$this->message = $message;
		$this->data = $data;
	}
}

?>