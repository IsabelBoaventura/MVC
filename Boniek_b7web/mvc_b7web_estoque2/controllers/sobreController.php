<?php
class sobreController extends Controller {

    public function __construct()
    {
       
            $this->user = new Usuario();
            if( !$this->user->checkLogin()){
                // se não achar login 
                header("Location: ".BASE_URL."/login");
                exit;
    
            }
        
    }

    public function index() {
        $data = array();

        $this->loadTemplate('sobre', $data);
    }

    public function teste(){
        echo ' <br> ACTION {teste} de dentro do CONTROLLER {sobre}';
    }

    public function autor(){
        echo ' <br> ACTION {autor} de dentro do CONTROLLER {sobre}';
    }


}