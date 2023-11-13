<?php

namespace App\Http;

class Request{

    /**Método HTTP utilizado para criar esta requisicao */
    private $httpMethod;

    /**uri da pagina */
    private $uri; 

    /**Parâmetros que vieram na página */
    private $queryParams = [] ;

    /**Variaveis que recebemos no POST da página */
    private $postVars = [];

    /**Cabeçalho da requisição */
    private $headers = [];

    /**Construtor da classe  */
    public function __construct()
    {
        
        $this->queryParams = $_GET ?? [];
        $this->postVars = $_POST ?? [];
        $this->headers = getallheaders();
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri = $_SERVER['REQUEST_URI'] ?? '' ;

    }

    /**Metodo responsavel por retornar o methodo http da requisicao  */
    public function getHttpMethod(){
        return $this->httpMethod;
    }

    /**Metodo responsavel por retornar a uri  da requisicao  */
    public function getUri(){
        return $this->uri;
    }


    /**Metodo responsavel por retornar o Headers  da requisição   */
    public function getHeaders (){
        return $this->headers;
    }

    /**Metodo responsavel por retornar os parametros da URL    */
    public function getQueryParams (){
        return $this->queryParams;
    }


    /**Metodo responsavel por retornar as variaveis do post da requisição   */
    public function getPostVars (){
        return $this->postVars;
    }
}