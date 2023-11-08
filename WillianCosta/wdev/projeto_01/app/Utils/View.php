<?php

namespace App\Utils;

class View{

    /**
     * Método responsável por retornar o conteudo de uma view
     * Recebe o conteudo exato do arquivo em HTML
     * @param string $view
     * @return string 
     */
    private static function getContentView($view){
        $file = __DIR__.'/../../resources/view/'.$view .'.html';

        $conteudo_vazio = '<br>Conteudo quando a pagina nao for encontrada <br>'.$file ; 

        return file_exists( $file)? file_get_contents($file) :  $conteudo_vazio;

    }

    /** 
     * Método responsável por retornar o conteudo renderizado de uma views  
     * @param string $view
     * @return string 
    */
    public  static function render( $view ){

        //variavel com o conteudo da view 
        $contentView = self::getContentView( $view);

        //retorna o conteudo renderizado 
        return $contentView ;

    }

}


?>