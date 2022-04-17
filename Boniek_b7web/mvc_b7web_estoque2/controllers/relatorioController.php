<?php

class relatorioController extends Controller {

    public function  __construct(){

        parent::__construct();
        $this->user = new Usuario();
        if( !$this->user->checkLogin()){
            // se não achar login 
            header("Location: ".BASE_URL."/login");
            exit;
        }
    }


    public function index(){
        $data =array();

        $p = new Produtos();

        $data['list'] = $p->getRelatorioProdutosFaltando();

       // var_dump( $data );

        $this->loadTemplate('relatorio', $data );
    }



}

?>