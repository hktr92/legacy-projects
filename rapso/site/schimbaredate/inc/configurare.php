<?php
	$titlu="Metin2Rapsodia - Istoria continua..."; 			// Titlu website 
	$server = ""; 					// Ip-ul de la server
	$user= ""; 							// User-ul de conectare la database
	$pass = ""; 						// Parola de conectare la database
	mysql_connect($server, $user, $pass) or die(mysql_error());
	mysql_select_db('account');
	mysql_set_charset('utf8');


 ?>