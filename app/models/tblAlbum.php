<?php 

	class tblAlbum extends Model {

		public function __construct () {
			$table = 'tblAlbum';
			
			parent::__construct ($table);
		}

		public function geefAantalInTabel () {
			$result = $this->query ('Select * from tblAlbum');
			return $this->aantalRijenInTabel ();
		}

		public function haalAlbumsOp ($bindParams) {
			return $this->query ('Select * from tblalbum Order By :SortNaam, albumId Limit :start , :end', $bindParams);
		}
		
		public function haalAlbumsInfoOpId ($bindParams) {
			return $this->query ('Select * from tblAlbum Where albumId = :albumId', $bindParams);
		}
		
		public function haalAlbumsOpBijArtiest ($bindParams) {
			return $this->query ('Select * from tblalbum Where artiestId = :artiestId Order By Jaar', $bindParams);
		}

		public function vindAlbumOpTitel ($bindParams) {
			return $this->query ('Select tblArtiest.artiestNaam, tblArtiest.artiestId, tblAlbum.albumNaam, tblAlbum.jaar, tblAlbum.albumId, tblAlbum.artiestId from tblAlbum, tblArtiest Where tblAlbum.`albumNaam` Like :zoekTekst And tblAlbum.`artiestId` = tblArtiest.`artiestId` Order By tblAlbum.jaar, tblAlbum.albumNaam', $bindParams);	
		}

	}

?>
