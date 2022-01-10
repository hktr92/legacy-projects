<?php
    $host 	= "";
    $user 	= "";
    $pass 	= "";
		
    $sqlServ = mysql_connect($host, $user, $pass) OR
    die("Es konnte keine Verbindung zur Datenbank hergestellt werden.<br /> Fehlermeldung: ".mysql_error());
?>