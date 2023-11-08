<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Home{
    /**Metodo responsavel por retornar o conteudo (view) da Home
     * @return string 
     */
    public static function  getHome(){
        return View::render('pages/home');
        
        
        //'Olá Mundo de dentro da home.php ';

    }
}

?>