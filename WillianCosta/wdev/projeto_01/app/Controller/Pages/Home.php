<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Home extends Page {
    /**Metodo responsavel por retornar o conteudo (view) da Home
     * @return string 
     */
    public static function  getHome(){

        $objOrganization = new Organization;

        // echo '<pre>';
        // print_r(  $objOrganization );
        // echo '</pre>';
        // exit;



        //view da home 
        $content_original  =  View::render('pages/home', [
            'name' => 'WDEV - Canal',
            'description' => 'Canal do Youtube: https://youtube.com.br/wdevoficial',
            'site' => 'https://youtube.com.br/wdevoficial'
        ]);

        $content = View::render('pages/home' , [
            'name' => $objOrganization->name ,
            'description' => $objOrganization->description,
            'site' => $objOrganization->site
        ]);

        $title = 'WDEV - Canal - HOME';

        //retorna a View da pagina 
        return parent::getPage( 'WDEV - Canal - HOME', $content );
       
        
        //'Olá Mundo de dentro da home.php ';

    }
}

?>