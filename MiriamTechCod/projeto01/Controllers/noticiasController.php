<?php
Class noticiasController extends Controller{

    
    public function index(){
        // padrao www.nome.com/
        // 1) chama um model - buscar as informações do banco de dados 
        //vamos criar um exemplo,  criando dentro da models,  o arquivo usuarios.php


        //instancia da class usuarios
        //$u = new usuarios();
        //$dados = $u->getDadosUsuarios();



        // 2) chama a view
        //  $this->carregarTemplate('home', $dados );

        $this->carregarTemplate('noticias' );
        // com dois parametros , nome_da_view e dados que é opcional


        //3) juncao back end e front end
        // pegar os dados do banco e jogar dentro da view 
    }
}
?>