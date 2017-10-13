<?php

use m4\m4mvc\core\App;
use m4\m4mvc\core\Module;
use m4\m4mvc\core\Model;

require_once('vendor/autoload.php');

define('DS', DIRECTORY_SEPARATOR);

// create app instance
$app = new App;

// set your namespace
$app->settings = [
  'namespace' =>  'Example',
  'viewExtension' =>  'php',
  'renderFunction' => 'render'
];

Module::register([
  '' => [
    'render'  =>  'view',
    'folder'  =>  'views'
  ]
]);


// set controllers folder
$app->paths = [
  'controllers' =>  'controllers',
  'model'       =>  'model',
  'app'         =>  dirname(__FILE__),
  'namespace'   =>  'Example'
];

$app->controller = 'Todos';

$sqlite_path = dirname(__FILE__) . DS . 'db.sql';

Model::$adapter = 'sqlite';
$app->db([
  'path' => $sqlite_path
]);


if (!file_exists('db.sql')) {
  (new Example\Model\Todo)->install($sqlite_path);
}


// run the app
$app->run();
