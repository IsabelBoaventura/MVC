<?php

namespace App\Http;

class Response{
    private $httpCode = 200; //codigo do status da requisicao 
    private $headers =  [];
    private $contentType = 'text/html';
    private $content;

    /**Metodo responsavel por iniciar a classe e definir os valores 
     * @param integer $httpCode
     * @param mixed ( pois nao se sabe o tipo de dado que sera recebido )
     * @param string $contentType 
     */
    public function __construct( $httpCode , $content , $contentType = 'text/html'){
        $this->httpCode = $httpCode ;
        $this->content = $content ;
        $this->setContentType( $contentType) ;
        
    }

    /**Metodo responsavel por alterar o content type do Response
     * @param string $contentType 
     */
    public function setContentType( $contentType ){
        $this->contentType = $contentType ;
        $this->addHeader('Content-Type' , $contentType);
    }


    /**Metodo responsavel por adicionar um resgistro no cabecalho de response
     * @param string $key
     * @param string $value
     */
    public function addHeader( $key, $value ){
        $this->headers[$key] = $value ;
    }

    /**Metodo responsavel por enviar os Headers para o navegador  */
    private function sendHeaders(){
        //status
        http_response_code( $this->httpCode);

        //enviar headers 
        foreach( $this->headers as $key=>$value ){
            header( $key.': '.$value );
        }
    }
    

    /** Metodo responsavel por enviar a resposta para o usuario sera imprimindo em tela  */
    public function sendResponse(){
        //envia os Headers
        $this->sendHeaders();

        //imprime o conteudo
        switch ( $this->contentType ){
            case 'text/html':
                echo $this->content;
                exit;
        }

    }
}

?>