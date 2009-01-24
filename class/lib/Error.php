<?php

/**
 * Error return format
 * Usage:
 * 	return new Error('Files didn't uploaded. Please try again.');
 *
 */
class Error extends Result {
	public function __construct($message=NULL, $data=NULL) {
		parent::__construct(FALSE, $message, $data);
	}
}

?>