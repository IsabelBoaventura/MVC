<?php

Class Controller{
    public $dados;

    //chamado por todos os CONTROLLERS
    public function carregarTemplate( $nomeView , $dadosModel = array() ){
        $this->dados = $dadosModel;
        require 'views/template.php';
    }



    //Chamado no Template
    public function carregarViewNoTemplate( $nomeView ,  $dadosModel = array() ){
        extract( $dadosModel );
        require 'views/' . $nomeView . '.php'; 
    }



}

?>