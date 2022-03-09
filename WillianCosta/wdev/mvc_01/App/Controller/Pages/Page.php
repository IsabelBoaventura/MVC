<?php 

namespace App\Controller\Pages;

use \App\Utils\View;





class Page{

        
    /**
     * Metodo responsavel  por retornar o conteudo ( view ) da nossa página generica
     * @return string 
     *  */

    public static function getPage( $title, $content){
        //return 'Ola mundo !';
        //trocar 'pages/home' por 'pages/pages' pagina com bootstrap
        return View::render('pages/page', [
            'title' => $title ,
            'content' => $content
        ]);
    }
}

?>