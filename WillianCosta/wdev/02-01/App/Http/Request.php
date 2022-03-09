<?php

namespace App\Http;

class Request{

    /**Metodo HTTP da requisição
     * @var string 
     */
    private $httpMethod;
    private $uri ; // u r i ( ilha )
    private $queryParams = [];
    private $postVars = [];
    private $headers = [];


    /**Construtor da classe */
    public function __construct()
    {
        $this->queryParams = $_GET ?? [];
        $this->postVars = $_POST ?? [];
        $this->headers = getallheaders();
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';
    }


    /**Metodo responsavel por retornar o metodo HTTP da requisicao
     * @return string
     */
    public function getHttpMethod(){
        return $this->httpMethod;

    }

    /**Metodo responsavel por retornar a uri da requisicao 
     * 
     * @return string
     */
    public function getUri(){
        return $this->uri;

    }


    /**Metodo responsavel por retornar os headers da requisicao
     * @return string
     */
    public function getHeaders(){
        return $this->headers;

    }


    /**Metodo responsavel por retornar o metodo HTTP da requisicao
     * @return string
     */
    public function getQueryParams(){
        return $this->queryParams;

    }


    /**Metodo responsavel por retornar o metodo HTTP da requisicao
     * @return string
     */
    public function getPostVars(){
        return $this->postVars;

    }


}
?>