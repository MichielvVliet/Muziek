<?php

	
	class Database {
		
		private static $_obj = null;
		private static $_instance = null;

		private $_result;
		private $_dbh;
		private $_error = false;
		private $_query;
		private $_stmt;
		private $_count = 0;
		private $_lastInsertID = null;

	
		/* --------------------------------------------------------------------------------- 
		 * In de __construct wordt de database connectie gelegd
	 	* De __construct gaat af bij het instantieren van een nieuwe Database
	 	* ---------------------------------------------------------------------------------*/		
		public function __construct ($host, $dbname, $user, $pass){
			
			$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

			$options = array(
				PDO::ATTR_PERSISTENT	=> true,
				PDO::ATTR_ERRMODE	=> PDO::ERRMODE_EXCEPTION);

			try{
				$this->_dbh = new PDO ($dsn, $user, $pass, $options);
			} catch (PDOException $e) {
				$this->_error = $e->getMessage();
				echo $this->_error   . '<br />';
			}
		}

		public static function getInstance () {
			if (!isset (self::$_instance)) {
				self::$_instance = new Database (DB_HOST,
								   				DB_NAME,
								   				DB_USER,
								   				DB_PASSWORD);
			}
			return self::$_instance;
		}

		public function getRowCount () {
			
			if (!isset ($this->_count)) {
				return 0;
			}
			return $this->_count;
		}

		/* ---------------------------------------------------------------------------------	 
	 	 * De functie Query bereidt het Query statement wat op de tabellen wordt gedaan voor
	 	 * De functie krijgt als parameter de Query binnen
		 * ---------------------------------------------------------------------------------*/
		public function query ($query, $bindParams = []) {
			$this->_error = false;

			$this->_stmt = $this->_dbh->prepare($query);
			
			if (count ($bindParams)) {
				foreach ($bindParams as $key => $value) {
					$this->bind ($key, $value);
				}
			}

			if ($this->_stmt->execute ()) {
				$this->_result = $this->_stmt->fetchAll (PDO::FETCH_OBJ);
				$this->_count = $this->_stmt->rowCount ();
				$this->_lastInsertID = $this->_dbh->lastInsertID ();
			}
			return $this->_result;
		}

		/* ---------------------------------------------------------------------------------
		 * Een query kan parameters mee krijgen, deze moeten gebind
		 * Daar zorgt de functie bind voor
		 * De functie krijgt 3 parameters binnen
		 * - de naam van de parameter die wordt gebind
		 * - de waarde van de parameter
		 * - het type van de parameter (indien niet meegegeven is dit standaard null)
		 * ---------------------------------------------------------------------------------*/
		public function bind ($param, $value, $type = null) {

			if (is_null($type)) {
				switch(true) {
					case is_int($value):
						$type = PDO::PARAM_INT;
						break;
					case is_bool($value):
						$type = PDO::PARAM_BOOL;
						break;
					case is_null($value):
						$type = PDO::PARAM_NULL;
						break;
					default:
						$type = PDO::PARAM_STR;	
						break;
				}
			}

			$this->_stmt->bindParam ($param, $value, $type);
		}

		/* ---------------------------------------------------------------------------------
		 * De functie execute zorgt ervoor dat de query wordt uitgevoerd
		 * Geen invoer, wel uitvoer
		 * ---------------------------------------------------------------------------------*/
		public function execute() {
			return $this->_stmt->execute();
		}

		/* ---------------------------------------------------------------------------------
		 * De uitvoer moet door de aanroeper in een $variabele worden bewaard voor verdere
		 * bewerking.
		 * ---------------------------------------------------------------------------------*/
		public function resultset() {

			$this->execute();
			$this->_count = $this->_stmt->rowCount();
			return $this->_stmt->fetchAll(PDO::FETCH_ASSOC);
		}


		/* ---------------------------------------------------------------------------------
		 * De functie geeft voor iedere tabel de kolom namen terug
		 * ---------------------------------------------------------------------------------*/
		public function getColumns ($table) {
			$_result = [];			
			$_result =  $this->query ("Show Columns From {$table}");
			return ($this->_result);
		}
	}
?>
