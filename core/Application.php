<?php 

	class Application {

		public function __construct () {
			$this->_setReporting ();
			$this->_unregisterGlobals ();
		}

		private function _setReporting () {
			if (DEBUG) {
				error_reporting(E_ALL);
				ini_set('displayErrors', 1);
			} else {
				error_reporting(E_ALL);
				ini_set('displayErrors', 0);
				ini_set('logErrors', 1);
				ini_set('errorLog', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'errors.log');
			}
		}

		private function _unregisterGlobals () {
			if (ini_get('registerGlobals')) {
				$globalsArray = ['_SESSION',
								'_COOKIE',
								'_POST',
								'_GET',
								'_REQUEST',
								'_SERVER',
								'_ENV',
								'_FILES'];

				foreach ($globalsArray as $globale) {
					foreach ($GLOBALS[$globale] as $sleutel => $waarde) {
						if ($GLOBALS [$sleutel] === $waarde) {
							unset ($GLOBALS [$sleutel]);
						}
					}
				}
			}	
		}

	}



?>