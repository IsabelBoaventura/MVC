<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;
// use \App\Http\Response;
// use \App\Controller\Pages\Home;

//constante para definir a URL  do projeto
define('URL', 'http://localhost/mvc/WillianCosta/wdev/mvc');

// $objRequest = new \App\Http\Request;
// echo '<pre>';
// print_r( $objRequest );
// echo '</pre>';
// exit;

// $objresponse  = new \app\http\response( 404, 'ola mundo');
// $objresponse->sendresponse();

// echo '<pre>';
// print_r( $objResponse );
// echo '</pre>';
// exit;

//rota inicial
$objRouter = new Router(URL);
// echo '<pre>';
// print_r( $objRouter );
// echo '</pre>';

// //definição da primeira rota (HOME)
// // $objRouter->get('/', [
// //     function(){
// //         return new Response(200, Home::getHome() );
// //     }
// // ]);
// // exit;


// //Rota principal  - HOME
// $objRouter->get('/', [
//     function(){
//         return new Response(200, Home::getHome() );
//     }
// ]);



// //Rota SOBRE
// $objRouter->get('/sobre', [
//   function(){
//       return new Response(200, Home::getHome() );
//   }
// ]);



//incluir as rotas que estao em pagina separada
//routes => pages.php 
include __DIR__.'/routes/pages.php';

//Impirmni o response da rota 
$objRouter->run()->sendResponse();


// echo Home::getHome();

?>