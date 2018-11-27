<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

use Slim\App;
use Slim\Container;

$cnt = require_once './bootstrap.php';

$app = $cnt[App::class];
$app->run();
