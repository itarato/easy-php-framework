<?php

/**
 * Main's controller, subclass of Controller
 *
 */
class MainController extends Controller {
	// const DEFAULT_ACTION = 'index'; // default
	// public $default_layout = 'main'; // default
	
	/**
	 * Override Controller's constructor
	public function __construct($template) {
		parent::__construct($template);
	}
	 */	
	
	public function index() {
		$this->some_var = 'Let\'s code!';
		$this->notice = 'It\'s a simple notice. There are notice/warning/error here.';		 
	}
}

?>