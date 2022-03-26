<?php
class contatoController extends Controller {

    public function  __construct(){

        parent::__construct();
    }
    
    
    public function index() {
        $data = array();
        $this->loadTemplate('contato', $data);   


      
    }

    public function enviar_email(){

         //verificar se houve o envio das mensagens 
        //var_dump( $_POST );

        $data = array();

        if( isset($_POST['name']) && !empty($_POST['name']) ){
            $nome = $_POST['name'];
            $email = $_POST['mail'];
            $msg = $_POST['msg'];

            //testar se recebeu aglo 
            echo ' <br> NOME: '. $nome;
            exit; 
        }
        $this->loadTemplate('contato', $data);

    }

   
}