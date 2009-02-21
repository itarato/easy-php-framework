<?php

define('DEFAULT_CONTROLLER', "main");
define('DEFAULT_ACTION', "index");
define('DEBUG_MODE', TRUE || $_GET['debug'] == 'on');

// Change it to TRUE if you use database transaction
define('DB_REQUIRE', TRUE);
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_USER', 'johndoe');
define('DB_PASS', '');
define('DB_NAME', 'epf');

/**
 * Helper function collection helps you to deal with those
 * For further details read the documentation, or the ###Helper.php's function list
 * 
 * Helpers: ArrayHelper.php, HtmlHelper.php, StringHelper.php
 * e.g.: $helpers = array('Array', 'Html', 'String');
 */
$helpers = array('Array', 'Html', 'String');
?>
