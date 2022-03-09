<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;


class Home extends Page {

    /**
     * Metodo responsavel por retornar o conteudo da (view ) da home 
     * 
     * Metodo que retorna o conteudo para a view 
     * @return string 
     * */


    public static function getHome(){

        $sobreOrganization = new Organization;

        // echo '<pre>';
        // print_r( $sobreOrganization );
        // echo '</pre>';
        // return 'Ola mundo pagina<br> App\Controller\Pages\Home.php ';

        //agora alem do nome da view,  terá tambem dados 

        $content =  View::render( 'pages/home', [
            'name' => $sobreOrganization->name,
            'description' => $sobreOrganization->description 
            
        ]);

        //retorna a view 
        return parent::getPage( 'titulo da view Home', $content );

    }

}
?>