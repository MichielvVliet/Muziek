<?php 

	class tblLeden extends Model {

		public function __construct () {
			$table = 'tblLeden';
			
			parent::__construct ($table);
		}

		public function geefAantalInTabel () {
			$result = $this->query ('Select * from tblLeden');
			return $this->aantalRijenInTabel ();
		}
		public function haalLedenOp ($bindParams) {
			return $this->query ('Select * from tblLeden Order By :artiestId, LedenId Limit :start , :end', $bindParams);
		}
		
		public function haalLedenOpBijArtiest ($bindParams) {
			return $this->query ('Select * from tblLeden Where artiestId = :artiestId Order By ledenStart', $bindParams);
		}
	}
?>
