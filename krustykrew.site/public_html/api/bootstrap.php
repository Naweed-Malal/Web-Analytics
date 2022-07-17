<?php
require 'src/vendor/autoload.php';
require 'src/DatabaseConnector.php';
use Dotenv\Dotenv;

//use Src\DatabaseConnector;

$dotenv = new DotEnv(__DIR__);
$dotenv->load();

$dbConnection = (new Src\DatabaseConnector())->getConnection();
