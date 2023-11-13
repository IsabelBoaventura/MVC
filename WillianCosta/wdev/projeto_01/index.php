<?php 

require __DIR__.'/vendor/autoload.php';

/**Incluindo a Home  */
use \App\Controller\Pages\Home;
use App\Http\Request;
use App\Http\Response;

//teste para verificar se a request esta trazendo resposta 
$objRequest = new Request; 

// echo '<pre>';
// print_r($objRequest);
// echo '</pre>';
// exit;


//teste para verificar se a RESPONSE esta trazendo resposta 
$objResponse  = new Response(200, ' Ola Mundo da Response ') ; 

// echo '<pre>';
// print_r($objResponse );
// echo '</pre>';
// exit;

echo Home::getHome();

// echo '<br> teste index.php  ';

?>