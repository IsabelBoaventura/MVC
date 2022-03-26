<?php
require 'enviroment.php';

define("BASE_URL", "http://localhost/mvc_b7web");



global $config;

$config = array();

if( ENVIRONMENT == 'development'){
    $config['dbname'] = 'user';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';

}else{
    $config['dbname'] = 'user';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';

}

?>