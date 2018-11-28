<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

use Slim\App;

$cnt = require_once './bootstrap.php';

$app = $cnt[App::class];
$app->run();
