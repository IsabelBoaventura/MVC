<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Page{

    /**
     * Método responsável por renderizar o topo  da pagina 
     * 
     */
    private static function getHeader(){
        return View::render('pages/header');
    }



     /**
     * Método responsável por renderizar o rodape   da pagina 
     * 
     */
    private static function getFooter(){
        return View::render('pages/footer');
    }





    /**Metodo responsavel por retornar o conteudo (view) da página genérica
     * @return string 
     */
    public static function  getPage( $title , $content ){
        return View::render('pages/page', [
            'titulo_pagina' =>  $title,
            'header' => self::getHeader(),
            'footer' => self::getFooter(),
            'conteudo_pagina' => $content
        ]);
       
        
        //'Olá Mundo de dentro da home.php ';

    }
}

?>