<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Page{
    /**Metodo responsavel por retornar o conteudo (view) da página genérica
     * @return string 
     */
    public static function  getPage( $title , $content ){
        return View::render('pages/page', [
            'titulo_pagina' =>  $title,
            'conteudo_pagina' => $content
        ]);
       
        
        //'Olá Mundo de dentro da home.php ';

    }
}

?>