<?php
	$titlu="Metin2Rapsodia - Istoria Continua ..."; 			// Titlu website 
	$server = ""; 					// Ip-ul de la server
	$user= ""; 							// User-ul de conectare la database
	$pass = ""; 						// Parola de conectare la database
	mysql_connect($server, $user, $pass) or die('The MySQL Database has failed.');
	mysql_select_db('account');
	mysql_set_charset('utf8');
?>	