<?php
class sobreController extends Controller {

    public function __construct()
    {
        parent::__construct();   
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