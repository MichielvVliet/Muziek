<?php 

	class Input {

		public static function schonenInvoer ($dirty) {
			return htmlentities($dirty, ENT_QUOTES, "UTF-8");
		}

		public static function get ($input) {
			If (isset($POST [$input])) {
				var_dum($POST [$input]);
				return self::schonenInvoer ($POST [$input]);
			} else If (isset($GET [$input])) {
				return self::schonenInvoer ($GET [$input]);				
			}
		}
	}
?>