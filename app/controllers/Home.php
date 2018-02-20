<?php 

	class Home extends Controller {

		public function __construct ($controller, $action) {
			parent::__construct  ($controller, $action);

		}

		public function indexAction ($params = null) {
			$params = 'Michiel van Vliet';
			$this->view->render ('home/index', $params);
		}
	}



?>