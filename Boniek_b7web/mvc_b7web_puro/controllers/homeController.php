<?php
class homeController extends Controller {

    public function  __construct(){

        parent::__construct();
    }
    
    
    public function index() {
        // $data = array();
        // $this->loadTemplate('home', $data);


        
        $array = array();
        $videos = new videos();
        $array['videos'] = $videos->getList(4);

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
}