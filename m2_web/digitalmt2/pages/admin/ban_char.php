<?php
  if($_SESSION['user_admin']>=9) {
?>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Gebannte Chars</h3>
        <div class="big-line"></div>
        <table>
        	<tr>
        		<th>Account-ID</th>
        		<th>Charakter 1</th>
        		<th>Charakter 2</th>
        		<th>Charakter 3</th>
        		<th>Charakter 4</th>
        	</tr>
        	<?php
        		$sql = "SELECT * FROM `account`.`account` WHERE `status`='BLOCK'";
        		$result = mysql_query($sql, $sqlServ);

        		for($i = 0; $i < mysql_num_rows($result); $i++) {
        			$sql = "SELECT * FROM `player`.`player` WHERE `level`>='90' and `account_id`='" . mysql_result($result, $i, 'id') . "'";
        			$result2 = mysql_query($sql, $sqlServ);
        			if(mysql_num_rows($result2) > 0) {
        				echo "<tr>";
        				echo "<td>" . mysql_result($result, $i, 'login') . "</td>";
        				for($x = 0; $x < mysql_num_rows($result2); $x++) {
        					echo "<td>" . mysql_result($result2, $x, 'name') . " Lvl. " . mysql_result($result2, $x, 'level') . " " . $aRassen[mysql_result($result2, $x, 'job')] . "</td>";
        				}
        				echo "</tr>";
        			} 
        		}
        	?>
        </table>
<?php
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>  	</div>
    <div class="bottom"></div>
</div>