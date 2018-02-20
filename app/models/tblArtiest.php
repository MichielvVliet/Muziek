<?php 

	class tblArtiest extends Model {

		public function __construct () {
			$table = 'tblArtiest';
			
			parent::__construct ($table);
		}

		public function geefAantalInTabel () {
			$result = $this->query ('Select * from tblArtiest');
			return $this->aantalRijenInTabel ();
		}

		public function haalArtiestenOp ($volgorde, $bindParams) {
			return $this->query ('Select * from tblArtiest Order By `artiestNaam` ' . $volgorde . ' Limit :start , :end', $bindParams);
		}

		public function haalArtiestOpId ($bindParams) {
			return $this->query ('Select * from tblArtiest Where `artiestId` = :artiestId', $bindParams);
		}

		public function vindArtiestOpNaam ($bindParams) {
			return $this->query ('Select * from tblArtiest Where `artiestNaam` Like :zoekTekst', $bindParams);
		}

	}

?>