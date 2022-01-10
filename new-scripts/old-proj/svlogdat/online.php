			<?php 
require("svlogdat/svconfsig.php");

mysql_select_db("player");
	$cont = "SELECT * from player";          
	$contquery = mysql_query($cont);            
	$num = mysql_num_rows($contquery);    
		echo "<b><font face='' color='green'>$num</font></b><br>";    
	?>
	