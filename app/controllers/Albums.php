<?php
	
	class Albums extends Controller {

		private $_album 	 	= [];
		private $_albums		= [];
		private $_bindParams 	= [];
		private $_pagingParams 	= [];
		private $_rowCount 		= null;
		private $_start 		= 0;
		private $_pages			= 0;
		private $_pageEnd;
		private $_artiestId		= 0;
		private $_page 			= 0;
		private $_sortName		= '';

		public function __construct ($controller, $action) {
			
			parent::__construct  ($controller, $action);
			$this->loadModel ('tblAlbum');
			$this->view->setLayout ('default');

		}

		public function indexAction ($params = null) {

			$this->_rowCount	= $this->tblAlbumModel->geefAantalInTabel ();
			
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
			$_bindParams 	= [':SortNaam' => $this->_sortName, ':start' => $this->_start, ':end' => $this->_pageEnd];

			$_albums 			= $this->tblAlbumModel->haalAlbumsOp ($_bindParams);
			
			$data ['albums'] 	= $_albums;
			$data ['paging']	= $_pagingParams;

			If (!(sizeof($_albums) == 0)) {
				$this->view->render ('albums/index', $data);
			} else {
				$this->view->render ('/home/index');
			}
		}

		public function insertAction ($params = null) {
			$data = [];
			$this->view->render ('albums/insert', $data);
		}

		private function zetMaximumOpPagina () {

			If (isset ($_POST ['aantal'])) {
				switch ($_POST ['aantal']) {
					case '15':
						$_SESSION ['albumPage'] = 15;
						break;
					
					case '20':
						$_SESSION ['albumPage'] = 20;
						break;
					
					case '25':
						$_SESSION ['albumPage'] = 25;
						break;

					default:
						$_SESSION ['albumPage'] = 10;
						break;
				}
			} else {
				If (!isset ($_SESSION ['albumPage'])) {
					$_SESSION ['albumPage'] = 10;
				}
			}

			return $_SESSION ['albumPage'];
		}

		private function zetSorteerVolgorde () {

			If (isset ($_POST['sort'])) {

				switch ($_POST['sort']) {
					case 'Jaar':
						$sortColumn = 4;
						break;
					
					case 'Artiest':
						$sortColumn = 2;
						break;
					
					case 'Album':
						$sortColumn = 3;
						break;

					default:
						$sortColumn = 4;
						break;
				}

			} else {
				$sortColumn = 4;
			}

			return $sortColumn;

		}

	}
?>