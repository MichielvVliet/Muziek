<?php 
	// Deze class doet de afhandeling van de $_COOKIE (variabelen).
	// Deze kan door de hele app gebruikt worden.
	// Doordat het een core component is, kan het ook in een later project gekopieerd worden 
	class Cookie {
	
		// Functie set de $_COOKIE (variabele)
		// Invoer:
		// $name:		Naam van de COOKIE die wordt gezet
		// $value:		Waarde die in de COOKIE wordt opgeslagen
		// $expireTime:	Tijd hoelang de COOKIE geldig is (bewaard wordt)
		public static function set ($name, $value, $expireTime) {
			return (setCookie ($name, $value, time () + $expireTime)) ? true : false;
		}
		
		// Functie geeft de waarde van de opgegeven $_COOKIE (variabele) terug
		// Eerst kijken of de opgegeven $_COOKIE (variabele) bestaat
		// In het geval de variabele niet bestaat wordt False teruggegeven
		public static function get ($name) {
			return (self::exists ($name)) ? $_COOKIE [$name] : false;
		}

		// // Functie verwijdert de $_COOKIE (variabele)
		public static function delete ($name) {
			self::set ($name, '', -30);
		}
		
		// Functie kijkt of de opgegeven $_COOKIE bestaat
		// True  => bestaat
		// False => bestaat niet
		public static function exists ($name) {
			return (isset ($_COOKIE [$name])) ? true : false;
		}
	}
?>
