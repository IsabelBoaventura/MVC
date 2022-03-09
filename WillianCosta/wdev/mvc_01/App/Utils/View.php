<?php

namespace App\Utils;

class View{

    /** Metodo responsavel por retornar o conteudo de uma view
     * @param string $view
     * @return string
     */


    private static function getContentView( $view){

        $file = __DIR__.'/../../resources/views/'.$view.'.html';
        return file_exists( $file) ? file_get_contents( $file): "";

    }

    /**Metodo responsavel  ppor retornar o conteudo renderizado da view
     * @param string $view
     * @param array $vars  ( string/ numerico )
     * @return string 
     */
    public static function render( $view, $vars = [] ){
        // conteudo da View
        $contentView  = self::getContentView($view);

        /*
        //debug?
        echo '<pre>';
        print_r( $vars );
        echo '</pre>';
        exit ;
        */

        //descobrir  o nome das variaveis 
        //chaves dos arrays

        $keys = array_keys($vars );

        // echo '<pre>';
        // print_r( $keys );
        // echo '</pre>';

        //mapear os dados 

        $keys = array_map( function ($item){

            return '{{'.$item.'}}';
        }, $keys);

        //retorna o conteudo renderizado
       // return $contentView ;
       return str_replace( $keys, array_values($vars), $contentView);
    }
}

?>