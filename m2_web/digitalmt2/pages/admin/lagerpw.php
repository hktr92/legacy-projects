<?php
	if($_SESSION['user_admin']>=2) {
?>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Lagerpasswort auslesen</h3>
        <div class="big-line"></div>
		<?php
			if(!empty($_GET["read"]) && $_GET["read"] == "Auslesen") {
				if(!empty($_GET["charname"])) {
					$sqlCmd = "SELECT `account_id` FROM `player`.`player` WHERE `name`='" . mysql_real_escape_string($_GET["charname"]) . "'";
					$sqlQry = mysql_query($sqlCmd, $sqlServ);
					
					if(mysql_num_rows($sqlQry) == 1) {
						$sqlCmd = "SELECT `password` FROM `player`.`safebox` WHERE `account_id`='" . mysql_result($sqlQry, 0, 'account_id') . "'";
						$sqlQry = mysql_query($sqlCmd, $sqlServ);
						
						if(mysql_num_rows($sqlQry) == 1) {
							$pw = mysql_result($sqlQry, 0, 'password');
							if($pw == "")
								$pw = "000000";
								
							echo "<b>Das Lagerpasswort von " . $_GET["charname"] . " lautet: " . $pw . "</b><br />";
						} else {
							echo "<b style='color: red;'>Der Account hat kein Lager.</b><br />";
						}
					} else {
						echo "<b style='color: red;'>Es konnte kein Charackter mit dem Namen gefunden werden.</b><br />";
					}
				}
				else if(!empty($_GET["accid"])) {
					$sqlCmd = "SELECT `id` FROM `account`.`account` WHERE `login`='" . mysql_real_escape_string($_GET["accid"]) . "'";
					$sqlQry = mysql_query($sqlCmd, $sqlServ);
					
					if(mysql_num_rows($sqlQry) == 1) {
						$sqlCmd = "SELECT `password` FROM `player`.`safebox` WHERE `account_id`='" . mysql_result($sqlQry, 0, 'id') . "'";
						$sqlQry = mysql_query($sqlCmd, $sqlServ);
						
						if(mysql_num_rows($sqlQry) == 1) {
							$pw = mysql_result($sqlQry, 0, 'password');
							if($pw == "")
								$pw = "000000";
								
							echo "<b>Das Lagerpasswort von " . $_GET["accid"] . " lautet: " . $pw . "</b><br />";
						} else {
							echo "<b style='color: red;'>Der Account hat kein Lager.</b><br />";
						}
					} else {
						echo "<b style='color: red;'>Es konnte kein Charackter mit dem Namen gefunden werden.</b><br />";
					}
				} else {
					echo "<b style='color: red;'>Bitte gebe entweder den Characktername oder die Account-ID an.</b><br />";
				}
			}
		?>
		<form action="index.php" method="GET">
			<input type="hidden" name="s" value="admin"/>
			<input type="hidden" name="a" value="lagerpw"/>
			<table style="width: 100%;">
				<tr>
					<th class="topLine">Characktername:</th>
					<td class="topLine"><input type="text" name="charname" id="charname" /></td>
				</tr>
				<tr>
					<th class="topLine">Account-ID:</th>
					<td class="topLine"><input type="text" name="accid" id="accid" /></td>
				</tr>
				<tr>
					<th></th>
					<th class="topLine"><input type="submit" name="read" value="Auslesen" /></th>
				</tr>
			</table>
		</form>
		<div style="clear: both;"></div>
	</div>
    <div class="bottom"></div>
</div>
<?php
	}
?>