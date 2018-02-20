<?php 

	class Zoeken extends Controller {

		private $_criteria;
		public $data;
		
		public function __construct ($controller, $action) {
			parent::__construct  ($controller, $action);
			$this->loadModel ('tblArtiest');
			$this->loadModel ('tblAlbum');
			$this->loadModel ('tblTrack');
			$this->view->setLayout ('default');
		}

		public function indexAction ($params = null) {

			If (!empty ($_POST['zoekIn'])) {
				$_criteria = $_POST['zoekIn'];
			}

			If (strlen($_POST ['zoekTekst']) > 1 &&
				!empty($_criteria)) {

				$_bindParams 		= [':zoekTekst' => '%' . $_POST ['zoekTekst'] . '%'];

				for ($teller = 0; $teller < sizeof($_criteria); $teller++) {
					switch ($_criteria [$teller]) {
						case "artiest":
							$data ['artiesten']	= $this->tblArtiestModel->vindArtiestOpNaam ($_bindParams);
							break;
					
						case "album":
							$data ['albums']	= $this->tblAlbumModel->vindAlbumOpTitel ($_bindParams);
							break;

						case "track":
							$data ['tracks']	= $this->tblTrackModel->vindTrackOpTitel ($_bindParams);
							break;

						default:
							break;
					}
				}

				If (!(sizeof($data) == 0)) {
					$this->view->render ('zoeken/index', $data);
				} else {
					$this->view->render ('zoeken/index');					
				}

			} else {
				$this->view->render ('zoeken/index');					
			}

		}

	}



?>