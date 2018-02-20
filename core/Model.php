<?php 

	class Model {

		protected $_dbh;
		protected $_table;
		protected $_modelName;
		protected $_softDelete = false;
		protected $_columnNames = [];

		public $id;

		public function __construct ($table) {
			$this->_dbh 		= Database::getInstance ();
			$this->_table 		= $table;
			$this->_modelName 	= $table;

			$this->_setTableColumns ();
		}

		protected function _setTableColumns () {
			$columns = $this->getColumns ();
			foreach ($columns as $column) {
				$columnName 			= $column->Field;
				$this->_columnNames []	= $column->Field;
				$this->{$columnName} 	= null;
			}
		}

		public function getColumns () {
			return $this->_dbh->getColumns ($this->_table);
		}

		public function query ($sql, $bindParams = []) {
			$value 	= [];
			$value  = $this->_dbh->query ($sql, $bindParams);
			return $value ; 
		}

		public function aantalRijenInTabel () {
			$result = $this->_dbh->getRowCount ();
			return $result;
		}
		

	}

?>