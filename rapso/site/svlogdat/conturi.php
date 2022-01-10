			<?php
	require("svlogdat/svconfsig.php");
	
		mysql_select_db("account");
    $test = "SELECT * from account";
          $testquery = mysql_query($test);
            $num2 = mysql_num_rows($testquery);
    echo "<b><font face='' color='green'> $num2</font></b>";
	?>