<?php
include 'functions.php';
return [
    'db' => [
            'dsn' => 'mysql:host=localhost;dbname=demo',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
    ],
    'routes' =>  require 'routes.php',
    'id' => 'application',
    'basePath' => dirname(__DIR__),
];
