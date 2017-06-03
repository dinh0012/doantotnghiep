<?php
require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/App.php');
require(__DIR__ . '/common/config/bootstrap.php');
require(__DIR__ . '/common/config/const.php');
$config = require(__DIR__ . '/common/config/main.php');
$application = new \vendor\web\Application($config);

