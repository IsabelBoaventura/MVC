<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Home extends Page {
    /**Metodo responsavel por retornar o conteudo (view) da Home
     * @return string 
     */
    public static function  getHome(){

        //view da home 
        $content =  View::render('pages/home', [
            'name' => 'WDEV - Canal',
            'description' => 'Canal do Youtube: https://youtube.com.br/wdevoficial',
            'site' => 'https://youtube.com.br/wdevoficial'
        ]);

        $title = 'WDEV - Canal - HOME';

        //retorna a View da pagina 
        return parent::getPage( 'WDEV - Canal - HOME', $content );
       
        
        //'Olá Mundo de dentro da home.php ';

    }
}

?>