<?php

namespace App\Controller\Pages;

use \App\Utils\View;
class Page{

    /**Para trazer o footer e o header
     * Metodo responsavel por renderizar o topo da pagina 
     * @return string 
      */
    private static function getHeader(){
        return View::render('pages/header');

    }


    /**Para trazer o footer e o header
     * Metodo responsavel por renderizar o rodape  da pagina 
     * @return string 
      */
      private static function getFooter(){
        return View::render('pages/footer');

    }

    /**
     * Metodo responsavel por retornar o conteudo da (view ) da pagna generica
     * deve ser usada para todas as demais paginas  
     * @return string 
     * */


    public static function getPage(  $title , $content ){
        // return 'Ola mundo pagina<br> App\Controller\Pages\Home.php ';

        //agora alem do nome da view,  terá tambem dados 

        return View::render( 'pages/page', [
            'title' =>  $title , 
            'header'  => self::getHeader(),
            'footer' => self::getFooter(),
            'content' => $content 
        ]);

    }

}
?>