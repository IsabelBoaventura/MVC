<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;
use \App\Http\Response;
use \App\Controller\Pages\Home;

//constante para definir a URL  do projeto
define('URL', 'http://localhost/mvc/WillianCosta/wdev/02-01');

//$objRequest = new \App\Http\Request;
// echo '<pre>';
// print_r( $objRequest );
// echo '</pre>';
//exit;

// $objResponse  = new \App\Http\Response( 200, 'Ola Mundo');
// $objResponse->sendResponse();

// echo '<pre>';
// print_r( $objResponse );
// echo '</pre>';
// exit;

//teste das rotas
//rota inicial
 $objRouter = new Router(URL);
// echo '<pre>';
// print_r( $objRouter );
// echo '</pre>';

//definição da primeira rota 
$objRouter->get('/', [
    function(){
        return new Response(200, Home::getHome() );
    }
]);
// exit;

//Impirmni o response da rota 
//
$objRouter->run()->sendResponse();


// echo Home::getHome();

?>