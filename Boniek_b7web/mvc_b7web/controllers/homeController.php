<?php

namespace src\controllers;

use \core\Controller;
use \models\videos;


    class homeController extends Controller{

        public function __construct()
        {
            parent::__construct();
        }

        public function index(){
            $array  = array();          

            $videos = new videos();
            $array['videos'] = $videos->getList(4);
            // $array['nome'] = 'Boniek';
            //$this->loadView("home" , $array );
            $this->loadTemplate('home', $dados );
        }

        public function teste(){
            echo ' Executou esta ação - ACTION {teste}';
        }
    }

?>