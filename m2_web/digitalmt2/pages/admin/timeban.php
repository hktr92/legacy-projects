<?php
	if($_SESSION['user_admin']>=3) {
?>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Timeban</h3>
        <div class="big-line"></div>
<?php
		if(isset($_GET["time"]))
		{
			if($_GET["time"] == "Default")
			{
				// check int
				if(is_int($_GET["year"]) && is_int($_GET["month"]) && is_int($_GET["day"]) && is_int($_GET["hour"]) && is_int($_GET["minute"]))
				{
					// build time string
					$timeString = $_GET["year"] . "-" . $_GET["month"] . "-" . $_GET["day"] . " " . $_GET["hour"] . ":" . $_GET["minute"] . ":00";
					
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
							$query = "INSERT INTO `homepage`.`timeban_log`(`account_id`, `charname`, `reason`, `availDt`, `banned_by`, `banned_from_ip`) VALUES(" .
									 "'" . $account_id . "', '" . $charname . "', '" . $_GET["reason"] . "', '" . $timeString . "', '" . $_SESSION['user_name'] . "', '" . $_SERVER['REMOTE_ADDR'] . "')";
							if(mysql_query($query, $sqlHp)) {
								echo '<b style="color: red;">Der Benutzer wurde erfolgreich gebannt.</b>';
							} else {
								echo '<b style="color: red;">Es ist ein unbekannter Fehler aufgetreten.</b>';
							}
						} else {
							echo '<b style="color: red;">Es ist ein unbekannter Fehler aufgetreten.</b>';
						}
					}
				} else {
					echo '<b style="color: red;">Bitte überprüfe deine Angaben.</b>';
				}
			} else { 
				if($_GET["time"] == "1 Tag")
				{
				
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
				<tr>
					<th class="topLine">Begründung:</th>
					<td class="topLine"><input type="text" name="reason" id="reason" /></td>
				</tr>
				<tr>
					<th class="topLine">Zeit:</th>
					<td class="topLine"><input type="text" name="hour" id="hour" value="HH" maxsize="2" /> <input type="text" name="minute" id="minute" value="MM" maxsize="2" /></td>
				</tr>
				<tr>
					<th class="topLine">Tag:</th>
					<td class="topLine"><input type="text" name="day" id="day" value="DD" maxsize="2" /> <input type="text" name="month" id="month" value="MM" maxsize="2" /> <input type="text" name="year" id="year" value="YYYY" maxsize="4" /> </td>
				</tr>
				<tr>
					<th></th>
					<th class="topLine"><input type="submit" name="time" value="Default" /></th>
				</tr>
			</table>
			<input type="hidden" name="s" value="admin"/>
			<input type="hidden" name="a" value="timeban"/>
			<input type="submit" name="time" value="1 Tag" />
			<input type="submit" name="time" value="2 Tage" />
			<input type="submit" name="time" value="3 Tage" />
			<input type="submit" name="time" value="1 Woche" />
			<input type="submit" name="time" value="3 Wochen" />
			<input type="submit" name="time" value="1 Monate" />
			<input type="submit" name="time" value="3 Monate" />
		</form>
		<div style="clear: both;"></div>
	</div>
    <div class="bottom"></div>
</div>
<?php
	}
?>