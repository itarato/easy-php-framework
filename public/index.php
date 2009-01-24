<?php

include dirname(__FILE__).'/../setup.php';
include dirname(__FILE__).'/../class/core/ini.php';
$router = Loader::load("Router");
Conductor::conduct($router);

?>