<?php


class Core{

    //instancia da classe
    public function __construct()
    {
        $this->run();
    }


    public function run(){

        // 
        $parametros = array();

        if( isset($_GET['pag'])){
            //pag como esta no htacess 

            //login
            $url = htmlentities( addslashes( $_GET['pag']) );
        }

        /** Para entrar neste if tem de possuir  informações após o dominio
         * ( www.site.com/ ) */ 

         //classe/funcao/parametro
        if ( !empty($url) )
        {
            //&& $url != '/' ){
            //Existe metodo

            $url = explode('/', $url);

            $controller = $url[0].'Controller';

            //retira o primeiro valor da array e reorganiza
            array_shift( $url );

            /**
             * 
             * 
             */

             // se usuario mandou a funcao
            if( isset($url[0]) &&  !empty($url[0]) ){
                $metodo = $url[0] ; 
                array_shift( $url );
            }else{

                //enviou apenas a classe sem o metodo
                $metodo = 'index' ;

            }

            //verificar se ainda há alguma informação no array 
            if( count($url) > 0){
                $parametros = $url;
                //pegar o que sobrou da url e mandar como se fosse uma parametro 
                
            }
        }else{
            /**Sem informações apos o dominio ( www.site.com ) */

            $controller = 'homeController' ;
            $metodo  = 'index';
        }

        // irá receber todo o caminho até chegar na pasta 
        $caminho = 'MVC/MiriamTechCod/projeto01/Controllers/'.$controller . '.php';
        // o caminho completo, após entrar no localhost,  onde esta o sistema 
        //C:\laragon\www\MVC\MiriamTechCod\projeto01\Controllers

        // verifica se o caminho e o metodo  não existem 
        // se nao existir adicionar o metodo padrao 
        if(  !file_exists(  $caminho )  && !method_exists( $controller , $metodo )){
            $controller = 'homeController' ;
            $metodo  = 'index';  
        }


        // instanciar 
        $c = new $controller ;

        call_user_func_array(  array( $c, $metodo) , $parametros  );

    }
}

?>