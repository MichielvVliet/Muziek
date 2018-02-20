<?php 
	
	define('DEBUG', true);
	define ('SROOT', '/index');

	//Default controller if in the $url there isn't defined any
	define ('DEFAULT_CONTROLLER', 'Home');
	define ('DEFAULT_LAYOUT', 'default');
	define ('SITE_TITLE', 'Mijn Muziek');
	
	//Definition of the current MySQL Database
	define ('DB_NAME', 'muziek');
	define ('DB_USER', 'root');
	define ('DB_PASSWORD', 'K2Ip2Xqv!');
	define ('DB_HOST', 'localhost');

	//Definitions for the User Sessions and Cookies
	define('CURRENT_USER_SESSION_NAME', 'EenLanGEStringMEtHoofdenKLEINEletters');
	define('REMEMBER_ME_COOKIE_NAME', 'RandomLettersAndNumbers19568789');
	define('REMEMBER_COOKIE_EXPIRY', 6048000);	/* 30 days (in seconds)*/

?>