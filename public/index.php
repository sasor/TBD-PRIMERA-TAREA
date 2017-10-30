<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('APP', realpath(__DIR__.DS.'..'));
define('BASE', realpath(__DIR__));

require_once(APP.DS.'app'.DS.'bootstrap'.DS.'init.php');

session_name('tbd');
session_start();
$app = new App;
