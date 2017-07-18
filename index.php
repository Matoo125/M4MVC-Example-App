<?php

use m4\m4mvc\core\App;

require_once('vendor/autoload.php');

define('DS', DIRECTORY_SEPARATOR);

// create app instance
$app = new App;

// set your namespace
$app->settings = [
  'namespace' =>  'Example'
];

// set controllers folder
$app->paths = [
  'controllers' =>  'controllers'
];

// set db connection if needed
$app->db([
  'DB_HOST'   =>  'localhost',
  'DB_PASSWORD' =>  '',
  'DB_NAME'   =>  'test',
  'DB_USER'   =>  'root'
]);

// run the app
$app->run();
