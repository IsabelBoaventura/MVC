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

 
        
        $array = array();
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


    public function add(){
        $data = array();
        $p = new Produtos();

        if(!empty($_POST)){
            $cod = $_POST['codigo'];
            $name = $_POST['nome'];
            $qtd_atual = $_POST['qtd_atual'];
            $qtd_min = $_POST['qtd_min'];
            $preco = $_POST['preco'];

            $p->addProdutos($cod, $name, $qtd_atual, $qtd_min, $preco );

            header("Location: ".BASE_URL); 
            exit;

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

        $data = array();
        $p = new Produtos();

       
        if(!empty($_POST)){
            $cod = $_POST['codigo'];
            $name = $_POST['nome'];
            $qtd_atual = $_POST['qtd_atual'];
            $qtd_min = $_POST['qtd_min'];
            $preco = $_POST['preco'];

           //
            $p->editProduto($cod, $name, $qtd_atual, $qtd_min, $preco , $id );

            // 
            header("Location: ".BASE_URL); 
            //
             exit;

          

        }

        $data['info'] = $p->getProduto( $id );

       // var_dump( $data );

        //var_dump( $data );
        $this->loadTemplate('edit', $data);


      

    }
}