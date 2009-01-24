<?php
/**
 * Conductor class
 * 
 * This class gets a Router object, and render a website from that
 *
 */
class Conductor {
	/**
	 * Main static method
	 * Get info from the Router instance, and generate the page
	 *
	 * @param Router $router initialized Router object
	 */
	public static function conduct($router) {
		// Get info
		$controller_class 	= ucfirst($router->getController())."Controller";
		$controller 		= $router->getController();
		$action				= $router->getAction();
		
		// Create view
		$oTemplate = Loader::load("Template");
		$oTemplate->init($controller, $action);
		// Instantiate controller		
		$oController = new $controller_class($oTemplate);
		// Make action
		$oController->setUp();
		$oController->$action();
		$oController->tearDown();
		
		// Give params from controller to action
		$oTemplate->setParams($oController->getParams());
		// Set controllers own layout
		$oTemplate->setLayout($oController->getLayout());
		
		// Print web page
		$oTemplate->renderToScreen();
	}
}
?>