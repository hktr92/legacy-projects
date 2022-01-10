<?php
	$titlu="Metin2Rapsodia - Istoria Continua ..."; 			// Titlu website 
	$server = "188.212.100.109"; 					// Ip-ul de la server 
	$user= "site20"; 							// User-ul de conectare la database
	$pass = "JTrVrWt1UtXvbtAwvoYxtc7hVRZ2LxBWtWTTIYqZDRHrH"; 						// Parola de conectare la database
	mysql_connect($server, $user, $pass) or die('The MySQL Database has failed.');
	mysql_select_db('account');
	mysql_set_charset('utf8');
?>	