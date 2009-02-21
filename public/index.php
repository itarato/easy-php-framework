<?php

include dirname(__FILE__).'/../setup.php';
include dirname(__FILE__).'/../core/base/ini.php';
$router = Loader::load("Router");
Conductor::conduct($router);

?>