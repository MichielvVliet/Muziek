<?php 

	// Deze class doet de afhandeling van de $_SESSION (variabelen).
	// Deze kan door de hele app gebruikt worden.
	// Doordat het een core component is, kan het ook in een later project gekopieerd worden 
	class Session {
	
		// Functie set de $_SESSION (variabele)
		public static function set ($name, $value) {
			return ($_SESSION [$name] = $value);
		}
		
		// Functie geeft de waarde van de opgegeven $_SESSION (variabele) terug
		// Eerst kijken of de opgegeven $_SESSION (variabele) bestaat
		// In het geval de variabele niet bestaat wordt False teruggegeven
		public static function get ($name) {
			return (self::exists ($name)) ? ($_SESSION [$name]) : false;
		}

		// Functie verwijdert de $_SESSION (variabele)
		public static function delete ($name, $value) {
			if (self::exists ($name)) {
				unset ($_SESSION [$name]);
			}
		}
		
		// Functie kijkt of de opgegeven $_SESSION bestaat
		// True  => bestaat
		// False => bestaat niet
		public static function exists ($name) {
			return (isset ($_SESSION [$name])) ? true : false;
		}
	}

?>