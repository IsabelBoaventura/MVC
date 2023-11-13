<?php

namespace App\Http;

class Response {

    /**Codigo do status http */
    private $httpCode = 200;

    /**Cabeçalho da Response  */
    private $headers = [];


    /**tipo de conteudo que esta sendo retornado  */
    private $contentType  = 'text/html';

    /**conteudo do response */
    private $content; 

   

    /**
     * Método responsavel por iniciar a classe e definir os valores 
     */
    public function __construct( $httpCode, $content, $contentType = 'text/html')
    {
        
        $this->httpCode = $httpCode;
        $this->content = $content ;
        
        $this->setContentType( $contentType);
        

    }

    /**Metodo responsavel por alterar o content Type do response   */
    public function setContentType( $contentType){
        $this->contentType = $contentType;
        $this->addHeader('Content-Type',  $contentType );
    }

    /**Metodo responsavel por adicionar um registro ao cabeçalho de response   */
    public function addHeader( $key, $value ){
         $this->headers[$key] = $value ;
    }


    /**Metodo responsavel por enviar a resposta para o usuario */
    public function sendResponse(){
        
    }



}