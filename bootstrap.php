<?php

use App\Provider\Doctrine;
use App\Provider\Slim;
use Slim\Container;

require './vendor/autoload.php';

define('APP_ROOT', __DIR__);

$cnt = new Container(require __DIR__ . '/settings.php');

$cnt->register(new Doctrine())
    ->register(new Slim());

return $cnt;
