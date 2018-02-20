<?php 

	class View {
		protected $_head;
		protected $_body;
		protected $_siteTitle 		= SITE_TITLE;
		protected $_outputBuffer;
		protected $_layout 			= DEFAULT_LAYOUT;
		protected $_paging 			= null;
		protected $_BioAlbumLeden	= null;
		protected $_fouten			= null;
		protected $_userLoggedId	= false;

		public function __construct () {

		}

		public function siteTitle () {
			return $this->_siteTitle;
		}

		public function Paging () {
			return $this->_paging;
		}

		public function userLoggedIn () {
			return $this->_userLoggedId;
		}
		
		public function toonFouten () {
			return $this->_fouten;
		}

		public function BioAlbumLeden () {
			return $this->_BioAlbumLeden;
		}
		
		public function BandNaam () {
			return session::get ('bandNaam');
		}

		public function render ($viewName, $params = null, $paging = null) {
			$viewArray  = explode ('/', $viewName);
			$viewString = implode (DS, $viewArray);

			if (file_exists (ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php')) {
				include (ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php');
				include (ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_layout . '.php');
			} 
		}

		public function content ($type) {

			if ($type == 'head') {
				return $this->_head;
			} elseif ($type == 'body') {
				return $this->_body;
			}
			return false;
		}

		public function start ($type) {
			$this->_outputBuffer = $type;

			 // Output Buffer Builtin PHP function
			ob_start ();
		}

		public function end () {

			if ($this->_outputBuffer == 'head') {
				$this->_head = ob_get_clean ();
			} elseif ($this->_outputBuffer == 'body') {
				$this->_body = ob_get_clean ();
			}

		}

		public function setSiteTitle ($title) {
			$this->_siteTitle = $title;
		}

		public function setLayout ($path) {
			$this->_layout = $path;
		}

		public function setPaging ($params = [], $page) {
			$this->_paging  = '<div class = "paging">';
			$this->_paging .= '<a class = "paging" href = ' . $page . '/1>First</a> ';
			
			for ($teller = max(1, $params ['paging'] ['c'] - 5); $teller <= min($params ['paging']['c'] + 5, $params ['paging'] ['p']); $teller++) {
				$this->_paging .= '<a class = "paging" href = ' . $page . '/' . $teller . '/' . $params ['paging'] ['e'] . '>' . $teller . '</a> ';
			}
			$this->_paging .=  '<a class = "paging" href = ' . $page . '/' . $params ['paging'] ['p'] . '>Last</a> ';
			$this->_paging .=  '</div>';
		}

		public function setFouten ($params = []) {
			If (!is_null ($params)) {
				$this->_fouten = '<div class= "error-lijst"><ul>';

				foreach ($params as $fout) {
					$this->_fouten .= '<li>' . $fout [0] . '</li>';
				}
				$this->_fouten .= '</ul></div>';
			}
		}

		
		public function setUserLoggedIn ($param = false) {
			echo 'Parameter: ' . $param;
			$this->_userLoggedId = $param;
		}

		public function setBioAlbumLeden ($artiest) {
			$this->_BioAlbumLeden = '<div class= "float-rechts">';
			$this->_BioAlbumLeden .= '<a href = /artiestInfos/leden/' . $artiest . '>Leden</a> ';
			$this->_BioAlbumLeden .= '<a href = /artiestInfos/albums/' . $artiest . '>Albums</a> ';
			$this->_BioAlbumLeden .= '<a href = /artiestInfos/index/' . $artiest . '>BioGrafie</a> ';
			$this->_BioAlbumLeden .= '</div>';
			$this->_BioAlbumLeden .= '<p style="clear: both;">';
		}

		public function setBandNaam ($bandNaam) {
			session::set ('bandNaam' , $bandNaam);
		}

		function readImageBlob($base64) {

			$imageBlob = base64_decode($base64);
			$imagick   = new Imagick();
			
			$imagick->readImageBlob($imageBlob);
		
			header("Content-Type: image/png");
			return $imagick;
		
		}

//		for ($page = 1; $page <= $paging ['p']; $page++) {
//			echo '<a class = "paging" href = /artiesten/index/' . $page . '>' . $page . '</a> ';
//		}


	}
?>