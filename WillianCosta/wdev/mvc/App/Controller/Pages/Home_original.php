<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;


class Home extends Page {

    /**
     * Metodo responsavel por retornar o conteudo (view ) da home 
     * @return string 
     * */
    public static function getHome(){
        //INSTANCIA DE ORGANIZACAO
        $sobreOrganization = new Organization;

        // echo '<pre>';
        // print_r( $sobreOrganization );
        // echo '</pre>';
        // return 'Ola mundo pagina<br> App\Controller\Pages\Home.php ';

        //agora alem do nome da view,  terá tambem dados 
        // retorna a view da home 
        $content =  View::render( 'pages/home', [
            'name' => $sobreOrganization->name,
            'description' => $sobreOrganization->description 
            
        ]);

        //retorna a view da pagina
        return parent::getPage( 'Home', $content );

    }

}
?>