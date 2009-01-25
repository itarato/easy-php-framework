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
		$this->foo = 'bar';
		$this->notice = 'Hurray! It works. Let\'s get some beer...'';		 
	}
}

?>