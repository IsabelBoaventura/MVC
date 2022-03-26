<?php

use \core\Controller;

    class contatoController extends controller{

        public function __construct()
        {
            parent::__construct();
        }

        public function index(){
            //echo " action {index} do controller {sobre} ";
            $array = array();
            $this->loadTemplate("contato", array);
           
        }

        public function teste(){
            echo ' Executou esta ação - ACTION {teste} do controler sobre ';
        }

        public function ator(){
            echo ' action {ator} do controller {sobre} ';
        }
    }

?>