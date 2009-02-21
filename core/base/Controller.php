<?php
class Controller {
	/**
	 * Controllers template class
	 *
	 * @var Template
	 */
	public $template;
	/**
	 * Template vaiables displayed in php short tags in the tpl.
	 * Set a variable in the appropriate controller:
	 * $this->var1 = value1;
	 *
	 * @var array
	 */
	private $vars = array();
	/**
	 * Default layout file in view/layout/___.htpl
	 * Rewrite it for using another template 
	 *
	 * @var String
	 */
	public $default_layout = 'main';
	/**
	 * Default action, it loads, when action in url is unrecognizable 
	 *
	 * @var String
	 */
	const DEFAULT_ACTION = 'index';
	
	/**
	 * Create a controller
	 *
	 * @param Template $template
	 */
	public function __construct($template) {
		$this->properties = array();
		$this->template = $template;
		$this->vars = is_array($_SESSION['redirect_bckup']) ? $_SESSION['redirect_bckup'] : array(); 
		$_SESSION['redirect_bckup'] = NULL;
	}	
	
	/**
	 * Magic set function for saving variables in controller to view
	 * Usage: $this->variable = value;
	 *
	 * @param String $property
	 * @param Object $value
	 */
	public function __set($property, $value) {
		$this->vars[$property] = $value;
	}
	
	/**
	 * Magic get function, to retrieve controllers function
	 * Usage: eval($variable)
	 *
	 * @param String $property
	 * @return Object
	 */
	public function __get($property) {
		return $this->vars[$property];
	}
	
	/**
	 * Retrieve all the controller's variable that saved with __set
	 * EasyFramework use this to get variables for the view 
	 *
	 * @return Array
	 */
	public function getParams() {
		return $this->vars;
	}
	
	/**
	 * Get controllers layout
	 *
	 * @return String
	 */
	public function getLayout() {
		return $this->default_layout;
	}
	
	/**
	 * Wrapper function
	 * Invokes before controller's action
	 * Applicable for initialization, which needs before every action
	 *
	 */
	public function setUp() {
	}
	
	/**
	 * Wrapper function
	 * Invokes after controller's action
	 * Applicable for garbage collection, after every action
	 * 
	 */
	public function tearDown() {
	}
	
	/**
	 * Redirect request
	 *
	 * @param String $url url
	 * @param Boolean $enable_var_bckup set FALSE to disable sending controller's variables
	 */
	public function redirectTo($url, $enable_var_bckup=TRUE) {
		// Backup data to enable for next request
		$_SESSION['redirect_bckup'] = $enable_var_bckup ? $this->vars : NULL;
		header('Location: '.HTML_PATH.$url);
		exit;
	}

	/**
	 * Universal redirect function with url saving, if needs a redirect to
	 * place where redirect started
	 *
	 * @param String $url
	 */
	public function redirectToBackup($url) {
		$this->redirectTo($url.'?url='.(urlencode(Loader::load('Router')->getUrl())));
	}
}
?>