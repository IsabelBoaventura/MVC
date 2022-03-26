<?php

class Core {

    public function run(){
        $url = explode('index.php', $_SERVER['PHP_SELF']);
        $url = end( $url  );

        // echo 'URL ACESSADA: '. $url;
        // exit;

        $params = array();
        if(!empty($url) && $url != '/'){
            $url = explode('/', $url);
            array_shift( $url );

            $currentController = $url[0].'Controller';
            array_shift( $url );

            if( isset( $url[0])){
                $currentAction = $url[0];
                array_shift( $url);
            }else{
                $currentAction  = 'index';
            }

            if( count( $url ) > 0 ){
                $params = $url;
            }
        } else {
            $currentController = 'homeController';
            $currentAction = 'index';
        }

        // echo 'CONTROLLER: '. $currentController;
        // exit ;

        $c = new $currentController();
        call_user_func_array( array( $c, $currentAction), $params );


    }
}

?>