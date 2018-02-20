<?php 

	class ArtiestInfos extends Controller {

		private $_artiest 	 	= [];
		private $_artiesten 	= [];
		private $_bindParams 	= [];
		private $_pagingParams 	= [];
		private $_rowCount 		= null;
		private $_start 		= 0;
		private $_pages			= 0;
		private $_pageEnd		= 2;
		private $_artiestId		= 0;

		public function __construct ($controller, $action) {
			
			parent::__construct  ($controller, $action);
			$this->loadModel ('tblArtiest');
			$this->loadModel ('tblAlbum');
			$this->loadModel ('tblLeden');
			$this->view->setLayout ('default');

		}

		public function indexAction ($params = null) {

			if (!isset ($params)) {
				$this->_artiestId 	= 1;
			} else {
				$this->_artiestId 	=  (int)preg_replace("/[^\d]+/","",$params);
			}

			$_bindParams 	= [':artiestId' => $this->_artiestId];
			$_artiestAlbum 	= $this->tblArtiestModel->haalArtiestOpId ($_bindParams);
			
			if (!(sizeof($_artiestAlbum) == 0)) {
				$this->view->render ('artiestInfos/index', $_artiestAlbum);
			} else {
				$this->view->render ('/home/index');
			}
		}

	public function albumsAction ($params = null) {

			if (!isset ($params)) {
				$this->_artiestId 	= 1;
			} else {
				$this->_artiestId 	=  (int)preg_replace("/[^\d]+/","",$params);
			}

			$_bindParams 	= [':artiestId' => $this->_artiestId];
			$_artiestAlbum 	= $this->tblAlbumModel->haalAlbumsOpBijArtiest ($_bindParams);

			if (!(sizeof($_artiestAlbum) == 0)) {
				$this->view->render ('artiestInfos/albums', $_artiestAlbum);
			} else {
				$this->view->render ('/home/index');
			}
		}

	public function ledenAction ($params = null) {

			if (!isset ($params)) {
				$this->_artiestId 	= 1;
			} else {
				$this->_artiestId 	=  (int)preg_replace("/[^\d]+/","",$params);
			}

			$_bindParams 	= [':artiestId' => $this->_artiestId];
			$_artiestLeden 	= $this->tblLedenModel->haalLedenOpBijArtiest ($_bindParams);

			if (!(sizeof($_artiestLeden) == 0)) {
				$this->view->render ('artiestInfos/leden', $_artiestLeden);
			} else {
				$this->view->render ('/home/index');
			}
		}


	}
?>