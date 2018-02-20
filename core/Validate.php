<?php 

	class Validate {
		private $_succes = true;
		private $_errors = [];
		private $_dbh    = null;
	

		public function __construct () {
			$this->_dbh 		= Database::getInstance ();
		}

		public function controleren ($source, $items=[]) {
			$this->_errors = [];

			foreach ($items as $item=>$rules) {
				$item 		= Input::schonenInvoer ($item);
				$display 	= $rules['display'];

				foreach ($rules as $rule=> $rule_value) {
					$value 	= Input::schonenInvoer (trim ($source [$item]));

					if ($rule === 'verplicht' && empty ($value)) {
						$this->addError (["{$display} is required", $item]);
					} else if (!empty ($value)) {
						switch ($rule) {
							case 'min':
								If (strlen ($value) < $rule_value) {
									$this->addError (["{$display} minimaal {$rule_value} lang", $item]); 
								}
								break;

							case 'max':
								If (strlen ($value) > $rule_value) {
									$this->addError (["{$display} maximaal {$rule_value} lang", $item]); 
								}
								break;

							case 'gelijk':
								If ($value != $source [$rule_value]) {
									$matchDisplay = $items [$rule_value] ['dsiplay'];
									$this->addError (["{$display} en $matchDisplay zijn niet gelijk", $item]); 
								}
								break;

							default:
								break;
						}
					}
				}
			}
		}

		public function addError ($error) {
			$this->_errors[] = $error;

			if (empty ($this->_errors)) {
				$this->_succes = true;
			} else {
				$this->_succes = false;				
			}
		}

		public function fouten () {
			return $this->_errors;
		}

		public function success () {
			return $this->_succes;
		}
	}
?>