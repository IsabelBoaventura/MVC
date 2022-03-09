<?php

namespace App\Utils;

class View{

    /**
     * Metodo responsavel  por retornar o conteudo da view 
     * @param  string $view 
     * @return string 
     */
    private static function getContentView( $view ){
        $file = __DIR__.'/../../resources/view/'. $view. '.html';
        // eu acho que deveria ser ../view/pages... e depois o nome em html 
        //no home.php ele manda a variavel com o nome  ... pages/home
        //por isto que aqui não precisa do 'pages'
        return file_exists( $file ) ? file_get_contents( $file ) : '';

    }
    
    
    
    
    
    /**
     * Metodos responsanvel por retornar o conteudo renderizado de uma view 
     * @param string $view
     * @param array $vars ( string ou numerico )
     * @return string  
     */
     public static function render( $view , $vars = [] ){
        //conteudo da view 
        $contentView = self::getContentView( $view );

        //vendo as ifnroamções que vieram  para ca

        // echo '<pre>';
        // print_r( $vars  );
        // echo '</pre>';
        // exit;

        //descobrir o nome das variaveis que serão usadas
        //quais sao as chaves das arrays 

        $keys = array_keys( $vars );
        $keys = array_map( function($item){
            return '{{'.$item.'}}';
        }, $keys) ;

        //   echo '<pre>';
        // print_r( $keys  );
        // echo '</pre>';
        // exit;

        //retorna o conteudo renderizado
        //return $contentView; 
        return str_replace( $keys, array_values( $vars), $contentView );
     }
     
}
?>