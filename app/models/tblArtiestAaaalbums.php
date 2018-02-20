<?php 

	class tblArtiestAlbums extends Model {

		public function __construct () {
			$table = 'tblArtiestAlbums';
			
			parent::__construct ($table);
		}

		public function haalArtiestenAlbumsOp ($bindParams = []) {
			$result = $this->query ('Select * from tblArtiestAlbums Where artiestId = :artiestId', $bindParams);

			If ($result != '') {
				return $result;
			} else {
				return '';
			}
		}


	}

?>
