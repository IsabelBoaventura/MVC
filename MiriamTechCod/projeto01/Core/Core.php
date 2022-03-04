<?php


class Core{

    //instancia da classe
    public function __construct()
    {
        $this->run();
    }


    public function run(){

        // $parametros = array();

        if( isset($_GET['pag'])){
            //pag como esta no htacess 

            //login
            $url = htmlentities( addslashes( $_GET['pag']) );
        }


        if ( !empty($url) )
        {
            //&& $url != '/' ){
            //Existe metodo

            $url = explode('/', $url);

            $controller = $url[0]; //'Controller';

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

                //enviou apenas a classe sem o metrodo
                $metodo = 'index' ;

            }

            //verificar se ainda há alguma informação no array

            if( count($url) > 0){
                $parametros = $url;
                //pegar o que sobrou da url e mandar como se fosse uma parametro 
                
            }



        }
    }
}

?>