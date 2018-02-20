<?php 

	class Artiesten extends Controller {

		private $_artiest 	 	= [];
		private $_artiesten 	= [];
		private $_bindParams 	= [];
		private $_pagingParams 	= [];
		private $_rowCount 		= null;
		private $_start 		= 0;
		private $_pages			= 0;
		private $_pageEnd		= 0;
		private $_artiestId		= 0;
		private $_page 			= 0;
		private $_sortVolgorde  = '';

		public function __construct ($controller, $action) {
			
			parent::__construct  ($controller, $action);
			$this->loadModel ('tblArtiest');
			$this->view->setLayout ('default');

		}

		public function indexAction ($params = null) {

			$this->_rowCount		= $this->tblArtiestModel->geefAantalInTabel ();
			
			$this->_pageEnd 		= $this->zetMaximumOpPagina (); 
			$this->_sortVolgorde 	= $this->zetSorteerVolgorde ();
			
			if (!isset ($params)) {
				$this->_start 	= 0;
			} else {
				$params 		=(int)preg_replace("/[^\d]+/","",$params);
				$this->_start	= ($params * $this->_pageEnd) - $this->_pageEnd;
				$this->_page 	= $params;
				If ($this->_start > $this->_rowCount) {
					$this->_start 		= 0;
					$this->_page 		= 1;
				}
			}
			
			$this->_pages			= ceil ($this->_rowCount / $this->_pageEnd);			
			
			$_pagingParams 	= ['c' => $this->_page, 's' => $this->_start, 'e' => $this->_pageEnd, 'p' => $this->_pages];
			$_bindParams 	= [':start' => $this->_start, ':end' => $this->_pageEnd];
			
			$_artiesten 	= $this->tblArtiestModel->haalArtiestenOp ($this->_sortVolgorde, $_bindParams);
			
			$data ['artiesten'] 	= $_artiesten;
			$data ['paging']		= $_pagingParams;
			
			if (!(sizeof($_artiesten) == 0)) {
				$this->view->render ('artiesten/index', $data);
			} else {
				$this->view->render ('/home/index');
			}
		}

		public function createAction ($params = null) {
			$this->view->render ('artiesten/create');			
		}

		private function zetMaximumOpPagina () {

			If (isset ($_POST ['aantal'])) {
				switch ($_POST ['aantal']) {
					case '15':
						$_SESSION ['artiestPage'] = 15;
						break;
					
					case '20':
						$_SESSION ['artiestPage'] = 20;
						break;

					case '25':
						$_SESSION ['artiestPage'] = 25;
						break;
					
					default:
						$_SESSION ['artiestPage'] = 10;
						break;
				}
			} else {
				If (!isset ($_SESSION ['artiestPage'])) {
					$_SESSION ['artiestPage'] = 10;
				}
			}

			return $_SESSION ['artiestPage'];
		}

		private function zetSorteerVolgorde () {


			If (isset ($_POST['sort'])) {
			
				switch ($_POST['sort']) {
					case 'Artiest Oplopend':
						$_SESSION ['sortVolgorde'] = 'ASC';
						break;
					
					case 'Artiest Aflopend':
						$_SESSION ['sortVolgorde'] = 'DESC';
						break;

					default:
						$_SESSION ['sortVolgorde'] = 'ASC';
						break;
				}

			} else {
				$_SESSION ['sortVolgorde'] = 'ASC';
			}

			return $_SESSION ['sortVolgorde'];

		}

	}
?>