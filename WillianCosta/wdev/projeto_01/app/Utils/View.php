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
     * @param array $vars  ( string/number)
     * @return string 
    */
    public  static function render( $view , $vars = [] ){

        //variavel com o conteudo da view 
        $contentView = self::getContentView( $view);

        // echo '<pre>';
        // print_r( $vars);
        // echo '</pre>';
        // exit;

        //descobrir o nome das variáveis ( indices da array )
        $keys = array_keys( $vars );

        // echo '<pre>';
        // print_r($keys );
        // echo '</pre>';
        // exit;

        //mapea os indices e adiciona os caracteres que escolhemos para ser marcadores de variáveis 

        $keys = array_map( function ( $item){
            return '{{'.$item.'}}';
        }, $keys );

     
    //  echo '<pre>';
    //     print_r($keys );
    //     echo '</pre>';
    //     exit;

        //retorna o conteudo renderizado 
        return  str_replace( $keys, array_values($vars) , $contentView); //$contentView ;

    }

}


?>