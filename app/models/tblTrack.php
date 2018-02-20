<?php 

	class tblTrack extends Model {

		public function __construct () {
			$table = 'tblTrack';
			
			parent::__construct ($table);
		}

		public function geefAantalInTabel () {
			$result = $this->query ('Select * from tblTrack');
			return $this->aantalRijenInTabel ();
		}

		public function toonAlleTracks ($bindParams) {
			return $this->query ('Select * from tblTrack Order By `albumId`, `trackPos` Limit :start , :end', $bindParams);
		}

		public function toonAlleTracksvanAlbum ($bindParams) {
			return $this->query ('Select * from tblTrack where `albumId` = :albumId Order By `trackPos`', $bindParams);
		}

		public function vindTrackOpTitel ($bindParams) {
			return $this->query ('Select tblTrack.trackTitel, tblTrack.albumId, tblAlbum.albumNaam, tblAlbum.jaar, tblAlbum.albumId from tblTrack, tblAlbum Where tblTrack.`trackTitel` Like :zoekTekst And tblTrack.`albumId` = tblAlbum.`albumId` Order By tblAlbum.jaar', $bindParams);
		}

	}

?>
