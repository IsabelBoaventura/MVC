<?php
require 'environment.php';

global $config;
global $db;

define("BASE_URL", "http://localhost/mvc/Boniek_b7web/mvc_b7web_estoque2");

$config = array();
if(ENVIRONMENT == 'development') {
	//define("BASE_URL", "http://localhost/mvc_b7web_puro/");
	$config['dbname'] = 'base_de_teste';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	//define("BASE_URL", "http://localhost/mvc_b7web_puro/");
	$config['dbname'] = 'base_de_teste';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}

$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);