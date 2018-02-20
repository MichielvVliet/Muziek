<?php 

	class AlbumTracks extends Controller {

		private $_albums 	 	= [];
		private $_tracks	 	= [];
		private $_bindParams 	= [];
		private $_albumId		= 0;

		public function __construct ($controller, $action) {
			
			parent::__construct  ($controller, $action);
			$this->loadModel ('tblAlbum');
			$this->loadModel ('tblTrack');
			$this->view->setLayout ('default');

		}

		public function indexAction ($params = null) {

			if (!isset ($params)) {
				$this->_albumId 	= 1;
			} else {
				$this->_albumId 	=  (int)preg_replace("/[^\d]+/","",$params);
			}

			$_bindParams 		= [':albumId' => $this->_albumId];
			$data ['tracks'] 	= $this->tblTrackModel->toonAlleTracksvanAlbum($_bindParams);
			$data ['albums'] 	= $this->tblAlbumModel->haalAlbumsInfoOpId ($_bindParams);

			if (!(sizeof($data ['tracks']) == 0)) {
				$this->view->render ('AlbumTracks/index', $data);
			} else {
				$this->view->render ('/home/index');
			}
		}

	}
?>