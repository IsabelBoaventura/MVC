<?php
class homeController extends Controller {

    private $user; 

    public function  __construct(){

        parent::__construct();
        //construtor do Controller 
        
        //verificar se o toke3n   é o mesmo
        $this->user = new Usuario();
        if( !$this->user->checkLogin()){
            // se não achar login 
            header("Location: ".BASE_URL."/login");
            exit;

        }
    }
    
    
    public function index() {
        // $data = array();
        // $this->loadTemplate('home', $data);

 
        
        $array = array(
            // 'nome' => 'Isabel Boaventura '
            'menu' => array(
                BASE_URL.'/home/add' => 'Adicionar Produto',
                BASE_URL.'/relatorio' => 'Relatorio ',
                BASE_URL.'/login/sair' => 'Sair '
            )
        );

        $p = new Produtos();

        //recebendo a busca dos produtos 
        $s = '';
        if( !empty($_GET['busca']) ){
            $s = $_GET['busca'];

        }

        //echo ' variavel  s ===> '. $s ;

        $array['list'] = $p->getProdutos( $s );

       


        // $videos = new videos();
        // $array['videos'] = $videos->getList(4);

        $this->loadTemplate("home", $array);
    }

    public function teste(){
        echo ' <br> ACTION {teste} de dentro do CONTROLLER {home}';
    }

    public function videos(){

        $array = array();
        $videos = new videos();
        $array['videos'] = $videos->getList(4);

        // a partir daqui manda para a view - parte visivel do sistema 
        //$this->loadView("home", $array);
        // mas se eu quizer carregar a Template tem de ser usado  o  loadTamplete
        $this->loadTemplate("home", $array);
    }


    
    // public function filter_post_money( $t){
    //     $preco = filter_input( INPUT_POST, $t);
    //     $preco = str_replace('.', '', $preco) ;
    //     $preco = str_replace(',', '.', $preco);
    //     $preco = filter_var( $preco , FILTER_VALIDATE_FLOAT);

    //     return $preco ;
 
    // }


    public function add(){
        $data = array(
            'menu' => array(
                BASE_URL => ' Voltar '
            )
        );
        $p = new Produtos();
        $filters = new FiltersHelpers();

        if(!empty($_POST)){
            // $cod = $_POST['codigo'];
            // $name = $_POST['nome'];
            // $qtd_atual = $_POST['qtd_atual'];
            // $qtd_min = $_POST['qtd_min'];
            // $preco = $_POST['preco'];
         
            $cod = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT );             
            $name = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            
  
            $preco = $filters->filter_post_money('preco');
            $qtd_atual = $filters->filter_post_money('qtd_atual');
            $qtd_min = $filters->filter_post_money('qtd_min');
  
            if( $cod && $name && $preco && $qtd_atual && $qtd_min ){
                
                $p->addProdutos($cod, $name, $qtd_atual, $qtd_min, $preco );
                header("Location: ".BASE_URL); 
                exit;
            }else {
                $data['warning'] = 'Valores digitados incorretamente';
            }
  
  

        }

        $this->loadTemplate('add', $data);
    }

    public function del( $id ){

        // teste para mudar o estatus do produto
        $data = array();
        $p = new Produtos();
        $p->delProduto( $id );

        header("Location: ".BASE_URL); 
        exit;

    }




    public function edit( $id ){

        $data = array(
            'menu' => array(
                // BASE_URL.'/home/add' => 'Adicionar Produto',
                // BASE_URL.'/relatorio' => 'Relatorio ',
                // BASE_URL.'/login/sair' => 'Sair ', 
                BASE_URL => ' Voltar '
            )
        );
        $p = new Produtos();
        $filters = new FiltersHelpers();

       
        if(!empty($_POST)){
            //$cod = $_POST['codigo'];
            $cod = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT );
            // FILTER_SANITIZE_STRING depreciado na versao  8.1 do PHP 
            $name = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            // $qtd_atual = $_POST['qtd_atual'];
            // $qtd_min = $_POST['qtd_min'];
           
           
            // $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);

            // levando para o HELPER - funcao auxiliar 
            // $preco = $_POST['preco'];
            // $preco = str_replace('.', '', $preco) ;
            // $preco = str_replace(',', '.', $preco);
            // $preco = filter_var( $preco , FILTER_VALIDATE_FLOAT);

            //chamando a resposta do helper
            $preco = $filters->filter_post_money('preco');
            $qtd_atual = $filters->filter_post_money('qtd_atual');
            $qtd_min = $filters->filter_post_money('qtd_min');

            // echo ' <br>preco ';
            // var_dump( $preco );
            // echo ' <br>quantidade atual ';
            // var_dump( $qtd_atual );
            // echo ' <br> quanitade minuna ';
            // var_dump( $qtd_min );
            // exit;

            //Validar se os valores dos campos foram aceitos , se sim continua o processo 
            if( $cod && $name && $preco && $qtd_atual && $qtd_min ){
                     //
                $p->editProduto($cod, $name, $qtd_atual, $qtd_min, $preco , $id );

                // 
                header("Location: ".BASE_URL); 
                // 
                exit;


            }else {
                $data['warning'] = 'Valores digitados incorretamente';
            }


      
          

        }

        $data['info'] = $p->getProduto( $id );

       // var_dump( $data );

        //  var_dump( $data );
        $this->loadTemplate('edit', $data);


      

    }
}