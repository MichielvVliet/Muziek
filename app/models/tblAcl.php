<?php 

	class tblAcl extends Model {

		public function __construct () {

			$table = 'tblAcl';
			
			parent::__construct ($table);
		}

		public function haalMachtigingen ($userId) {
			$_BindParams = [':userId' => $userId];
			return $this->query ('Select * From tblAcl Where userId = :userId', $_BindParams);
		}
	}

?>