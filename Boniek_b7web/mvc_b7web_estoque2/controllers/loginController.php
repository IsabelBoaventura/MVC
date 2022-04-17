<?php
class loginController extends Controller{

    public function index(){
        //echo " login ... ";
        $data = array(
            'msg' => ''
        );

        if(!empty( $_POST['login'])){
            //verifica se esta preenchido 
            $ulogin = $_POST['login'];
            $usenha = $_POST['senha'];

            $users = new Usuario();
            if( $users->verificarUsuario( $ulogin, $usenha )){
                echo '<br> Correto .... vamos continuar ';
                //criar o token do usuario 
                //pode ser aqui dentro  ou em uma função separada
                $token = $users->createToken($ulogin);

                //salvando o token na sessao 
                $_SESSION['token'] = $token;

                //redirecionar para a pagina principal
                header("Location: ".BASE_URL);
                exit;

            }else{
                $data['msg'] = 'Login e/ou senha incorreto!';
            }

        }
        // 
        $this->loadView('login', $data);
        //desta forma nao carrega o css 

        // $this->loadTemplate('login', $data);
    }

    public function sair(){
        unset($_SESSION['token']);
        header("Location: ".BASE_URL."/login");
        exit;
    }
}


?>