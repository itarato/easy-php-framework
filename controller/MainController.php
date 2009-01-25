<?php

/**
 * Main's controller, subclass of Controller
 * Controllers the topmost parts of a website, like:
 * user / about / help / products / shop ... etc
 * Naming convention: 
 */
class MainController extends Controller {
	/**
	 * Customize default action to anything, eg: search, list, view...
	const DEFAULT_ACTION = 'whatever_you_want'; // default = index
	 */
	
	/**
	 * Customize default layout (found in ../view/layout
	public $default_layout = 'whatever_you_want'; // default = main
	 */
	
	/**
	 * Override Controller's constructor
	public function __construct($template) {
		parent::__construct($template);
		// your initialization code here
	}
	 */
	
	/**
	 * To create a new page (action) create a function, with the name of the page
	 * Notice! It must contains only alphabetic characters, digits and _. (in regexp: [a-z0-9_]+)
	public function my_subpage() {
		// custom business logic here
	}
	 */
	
	public function index() {
		$this->foo = 'bar';
		$this->notice = 'Hurray! It works. Let\'s get some beer...';		 
	}
	
	public function example() {
		$this->user = UserModel::getUserData($_GET['id']);		
		empty($this->user) ? 
			$this->warning = 'I can\' see any ID parameter in the URL:(' :
			$this->notice = 'Great, I\'ve got an ID: '.$_GET['id'];
			
	}
}

?>