<?php

/**
 * Success return format
 * Usage:
 * 	return new Success('Files uploaded.');
 *
 */
class Success extends Result {
	public function __construct($message=NULL, $data=NULL) {
		parent::__construct(TRUE, $message, $data);
	}
}

?>