<?php
/**
 * Process the url to get controller and action and params
 *
 */
class Router {	
	/**
	 * Controller classes are wrap an entity usually, and provide it's actions
	 *
	 * @var string
	 */
	private $controller;	
	/**
	 * Controller's action, which has to be called
	 *
	 * @var string
	 */
	private $action;
	// Whether the initialization has ended, true or false
	private $process_end_flag = FALSE;
	
	public function __construct() {	}
	
	/**
	 * Process query
	 * Get controller
	 * Get action
	 * 
	 * If init() can't find controller, it will be the DEFAULT CONTROLLER
	 * If init() can't fint action, it will be the value of the controller's static default_actions, otherwise the DEFAULT_ACTION
	 * These defaults are defined in class/core/ini.php
	 *
	 */
	public function init() {
		try {
			if (empty($_GET['controller'])) {
				throw new Exception('Class not find exception.');
			}
			$this->controller = $_GET['controller'];		
			$refl = new ReflectionClass(ucfirst($this->controller)."Controller");
		} catch (Exception $e) {
			$this->controller = DEFAULT_CONTROLLER;		
			$refl = new ReflectionClass(ucfirst($this->controller)."Controller");
		}

		if (!empty($_GET['action']) && in_array($_GET['action'], array_map(create_function('$o', 'return $o->name;'), $refl->getMethods()))) {
			$this->action = $_GET['action'];
		} else {
			try {
				$this->action = $refl->getConstant('DEFAULT_ACTION');
			} catch (Exception $e3) {
				$this->controller = DEFAULT_CONTROLLER;
				$this->action	  = DEFAULT_ACTION; 
			}
		}
		
		$this->process_end_flag = TRUE;
	}
	
	/**
	 * Get the controller
	 *
	 * @return string
	 */
	public function getController() {
		if (!$this->process_end_flag) {
			$this->init();
		}
		
		return $this->controller;
	}
	
	/**
	 * Get the action
	 *
	 * @return string
	 */
	public function getAction() {
		if (!$this->process_end_flag) {
			$this->init();
		}
		
		return $this->action;
	}
	
	/**
	 * Override toString function
	 *
	 * @return unknown
	 */
	public function __toString() {
		return "[#class: Router] [#controller: ".$this->controller."] [#action: ".$this->action."]";
	}
	
	/**
	 * Common redirect method
	 *
	 * @param String $url
	 */
	public static function redirectTo($url) {
		header('Location: '.HTML_PATH.$url);
		exit;
	}
	
	/**
	 * Get url without webdir
	 *
	 * @return String
	 */
	public function getUrl() {
		return '/'.$this->getController().'/'.$this->getAction().'/'.$_GET['id'];
	}
}

?>