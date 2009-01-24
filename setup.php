<?php


define('DEFAULT_CONTROLLER', "main");
define('DEFAULT_ACTION', "index");
define('HTML_PATH', '/ef_t2');
define('DEBUG_MODE', TRUE);

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'your_code');
define('DB_NAME', 'your_database_name');

/**
 * Helper function collection helps you to deal with those
 * For further details read the documentation, or the ###Helper.php's function list
 * 
 * Helpers: ArrayHelper.php, HtmlHelper.php, StringHelper.php
 * e.g.: $helpers = array('Array', 'Html', 'String');
 */
$helpers = array('Array', 'Html', 'String');
?>
