<?php 

namespace App\Controller\Pages;

use \App\Utils\View;

/**Gerencia as requisições que iram chegar na página inicial do site(home) */
// Controller deve mandar o conteudo para a view e nao deve ser o responsavel pelas informações na tela 


class Home extends Page {
    // home será uma pagina que recebera as funçoes do 'Page' 
    public static function getHome(){
        //return 'Ola mundo !';
        //trocar 'pages/home' por 'pages/pages' pagina com bootstrap
        //agora que temos a page original e a home esta extendida ,  
        //voltamos para pages/home
        $content =  View::render('pages/page', [
            'name' => 'wdev - Canal ',
            'description' => ' canal do youtuve '
        ]);

        // retorna a view da pagina 
        return parent::getPage('wdev - titulo ', $content );
    }
}

?>