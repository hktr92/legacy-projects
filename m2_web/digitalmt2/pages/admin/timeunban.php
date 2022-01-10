<?php
	if($_SESSION['user_admin']>=4) {
?>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Zeitsperre entsperren</h3>
        <div class="big-line"></div>
<?php
		if(isset($_GET["time"]))
		{
			// build time string
			$timeString = "0000-00-00 00:00:00";
					
			// get account id from charackter
			// ecaping char 
			$charname = mysql_real_escape_string($_GET["charname"]);
			$query = "SELECT `account_id` FROM `player`.`player` WHERE `name`='" . $charname . "'";
			$result = mysql_query($query, $sqlServ);
			if(mysql_num_rows($result) == 0)
			{
				echo '<b style="color: red;">Der Charackter konnte nicht gefunden werden.</b>';
			} else {
				$account_id = mysql_result($result, 0, 'account_id');
				$query = "UPDATE `account`.`account` SET `availDt`='" . $timeString . "'";
				if(mysql_query($query, $sqlServ)) {
					$query = "DELETE `homepage`.`timeban_log` WHERE `charname`='" . $charname . "'";
					mysql_query($query, $sqlHp);
					echo '<b style="color: red;">Der Benutzer wurde erfolgreich entbannt.</b>';
				} else {
					echo '<b style="color: red;">Es ist ein unbekannter Fehler aufgetreten.</b>';
				}
			}
		}
?>
		<form action="index.php" method="GET">
			<input type="hidden" name="s" value="admin"/>
			<input type="hidden" name="a" value="timeban"/>
			<table style="width: 100%;">
				<tr>
					<th class="topLine">Characktername:</th>
					<td class="topLine"><input type="text" name="charname" id="charname" /></td>
				</tr>
			</table>
			<input type="hidden" name="s" value="admin"/>
			<input type="hidden" name="a" value="timeunban"/>
			<input type="submit" name="time" value="Entbannen" />
		</form>
		<div style="clear: both;"></div>
	</div>
    <div class="bottom"></div>
</div>
<?php
	}
?>