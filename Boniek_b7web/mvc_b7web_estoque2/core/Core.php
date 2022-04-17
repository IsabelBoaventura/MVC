<?php
class Core {

	public function run() {
        //$url = '/'.(isset($_GET['url'])?$_GET['url']:'');
	    $url = explode('index.php', $_SERVER['PHP_SELF']);
	    $url =end($url);
		//
		// var_dump( $url );

		$params = array();
		if(!empty($url) && $url != '/') {
			$url = explode('/', $url);
			array_shift($url);

			$currentController = $url[0].'Controller';
			array_shift($url);
			// var_dump( $url );

			if(isset($url[0]) && $url[0] != '/') {
				$currentAction = $url[0];
				array_shift($url);
			} else {
				$currentAction = 'index';
			}

			if(count($url) > 0) {
				$params = $url;
			}

		} else {
			$currentController = 'homeController';
			$currentAction = 'index';
		}

		if(!file_exists('controllers/'.$currentController.'.php')) {
			$currentController = 'notFoundController';
			$currentAction = 'index';
		}

		// echo ' <br> CONTROLLER: '. $currentController; 
		// echo ' <br> ACTION: '. $currentAction; 
		
		$c = new $currentController();

		if(!method_exists($c, $currentAction)) {
			$currentAction = 'index';
		}

		call_user_func_array(array($c, $currentAction), $params);

	}

}