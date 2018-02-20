<?php 

	class Uagent {

		// Even uitleggen wat de regular expression doet en waarom ik deze hier gebruik
		public static function uAgentNoVersion () {
			$userAgent 	= $_SERVER['HTTP_USER_AGENT'];

			$regx		= '/\/[a-zA-Z0-9,.]+/';
			$userAgent 	= preg_replace ($regx, '', $userAgent);
			return $userAgent;
		}
	}
?>