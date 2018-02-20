<?php 
	class Router {

		public static function route ($url) {
			//Extract the controllers from the url
			$controller = (isset ($url[0]) && $url [0] != '') ? ucwords($url [0]) : DEFAULT_CONTROLLER;
			$controllerName = $controller;
			array_shift($url);

			//Extract the action from the url
			$action = (isset ($url[0]) && $url [0] != '') ? ($url [0]) . 'Action' : 'indexAction';
			$actionName = $action;
			array_shift($url);

			//Extract the parameters from the url
			$queryParams = $url;
			try {
				$dispatch = new $controller ($controllerName, $actionName);
				if (method_exists ($controller, $actionName)) {
					call_user_func_array ([$dispatch , $actionName], $queryParams);
				} 
			} catch (Exception $e) {
				echo 'Sorry voor het ongemak';
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}

		public static function redirect ($location) {
			If (!headers_sent ()) {
				header ('Location: ' . SROOT . $location);
				exit;
			} else {
				echo '<script type = "text/javascript">';
				echo 'window.location.href="' . SROOT . $location . '";';
				echo '</script>';
				echo '<noscript>';
				echo '<meta htt-equiv="refresh" content="0;url=' . $location . '" />';
				echo '</noscript>';
				exit;

			}
		}
	}
?>