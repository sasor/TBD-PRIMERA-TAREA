<?php

define('DS', DIRECTORY_SEPARATOR);
define('APP', realpath(__DIR__.DS.'..'));
define('BASE', realpath(__DIR__));

require_once(APP.DS.'app'.DS.'bootstrap'.DS.'init.php');

$app = new App;
