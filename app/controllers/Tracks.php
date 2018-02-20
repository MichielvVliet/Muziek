<?php
	
	class Tracks extends Controller {

		private $_track 	 	= [];
		private $_tracks		= [];
		private $_bindParams 	= [];
		private $_pagingParams 	= [];
		private $_rowCount 		= null;
		private $_start 		= 0;
		private $_pages			= 0;
		private $_pageEnd		= 0;
		private $_trackId		= 0;
		private $_page 			= 0;
		private $_sortName		= '';

		public function __construct ($controller, $action) {
			
			parent::__construct  ($controller, $action);
			$this->loadModel ('tblTrack');
			$this->view->setLayout ('default');

		}

		public function indexAction ($params = null) {

			$this->_rowCount	= $this->tblTrackModel->geefAantalInTabel ();
			$this->_pageEnd 	= $this->zetMaximumOpPagina (); 
			$this->_sortName 	= $this->zetSorteerVolgorde ();
			
			If (!isset ($params)) {
				$this->_start 			= 0;
			} else {
				$params 				= (int)preg_replace("/[^\d]+/","",$params);
				$this->_page 			= $params;
				$this->_start			= ($params * $this->_pageEnd) - $this->_pageEnd; 
				If ($this->_start > $this->_rowCount) {
					$this->_start 		= 0;
					$this->_page 		= 1;
				}
			}

			$this->_pages	= ceil ($this->_rowCount / $this->_pageEnd);			

			$_pagingParams 	= ['c' => $this->_page, 's' => $this->_start, 'e' => $this->_pageEnd, 'p' => $this->_pages];
			$_bindParams 	= [':start' => $this->_start, ':end' => $this->_pageEnd];
			
			$data ['tracks'] 	= $this->tblTrackModel->toonAlleTracks ($_bindParams);
			$data ['paging']	= $_pagingParams;

			if (!(sizeof($data ['tracks']) == 0)) {
				$this->view->render ('tracks/index', $data);
			} else {
				$this->view->render ('/home/index');
			}
		}

		public function createAction ($params = null) {
			$this->view->render ('tracks/create');			
		}

		private function zetMaximumOpPagina () {

			If (isset ($_POST ['aantal'])) {
				switch ($_POST ['aantal']) {
					case '25':
						$_SESSION ['trackPage'] = 25;
						break;
					
					case '50':
						$_SESSION ['trackPage'] = 50;
						break;
					
					case '75':
						$_SESSION ['trackPage'] = 75;
						break;
					
					case '100':
						$_SESSION ['trackPage'] = 100;
						break;

					default:
						$_SESSION ['trackPage'] = 25;
						break;
				}
			} else {
				If (!isset ($_SESSION ['trackPage'])) {
					$_SESSION ['trackPage'] = 25;
				}
			}
			return $_SESSION ['trackPage'];
		}

		private function zetSorteerVolgorde () {

			If (isset ($_POST['sort'])) {

				switch ($_POST['sort']) {
					
					case 'Track':
						$sortColumn = 3;
						break;
					
					case 'Album':
						$sortColumn = 2;
						break;

					default:
						$sortColumn = 1;
						break;
				}

			} else {
				$sortColumn = 1;
			}

			return $sortColumn;

		}
	}
?>