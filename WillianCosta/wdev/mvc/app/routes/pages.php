<?php


use \App\Http\Response;
use \App\Controller\Pages;
//use \App\Controller\Pages\Home;
//arquivos que estavam no index.php





//definição da primeira rota (HOME)
// $objRouter->get('/', [
//     function(){
//         return new Response(200, Home::getHome() );
//     }
// ]);
// exit;


//Rota principal  - HOME
$objRouter->get('/', [
    function(){
        return new Response(200, Pages\Home::getHome() );
    }
]);



//Rota SOBRE
$objRouter->get('/sobre', [
  function(){
      return new Response(200, Pages\Home::getHome() );
  }
]);

?>