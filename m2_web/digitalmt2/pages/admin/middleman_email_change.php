<?PHP
  if($_SESSION['user_admin']>=$adminRights['middleman_email_change']) {
?>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Middleman E-Mail Change</h3>
        <div class="big-line"></div>
		<?php 
			if($_POST["sent"]==1) 
			{ 
				$username = mysql_real_escape_string($_POST['username']);
				$password = mysql_real_escape_string($_POST['password']);
				$oldemail = mysql_real_escape_string($_POST['oldemail']);
				$newemail = mysql_real_escape_string($_POST['newemail']);
				$sql = "SELECT `id` FROM `account`,`account` WHERE `login`='" . $username . "' and `password`=PASSWORD('" . $password . "') and `email`='" . $oldemail . "'";
				$result = mysql_query($sql, $sqlServ);
				if(mysql_num_rows($result) == 1) {
					$sql = "UPDATE `account`.`account` SET `email`='" . $newemail . "' WHERE `login`='" . $username . "'";
					if(mysql_query($sql, $sqlServ)) {
						echo "<b>Die E-Mail Adresse wurde erfolgreich geändert</b>";
					} else {
						echo "<b>Es ist ein unbekannter Fehler aufgetreten.</b>";
					}
				} else {
					echo "<b>Eine oder mehrere der angebenen Daten stimmen nicht.</b>";
				}
			}			
		?>
		<form action="index.php?s=admin&a=middleman_email_change" method="POST">
			<table>
				<tr>
					<td>Account ID:</td>
					<td><input type="text" name="username" /></td>
				</tr>
				<tr>
					<td>Passwort:</td>
					<td><input type="text" name="password" /></td>
				</tr>
				<tr>
					<td>Alte E-Mail:</td>
					<td><input type="text" name="oldemail" /></td>
				</tr>
				<tr>
					<td>Neue E-Mail:</td>
					<td><input type="text" name="newemail" /></td>
				</tr>
				<tr>
					<td colspan='2'><input type="submit" value="Ändern" /></td>
				</tr>
				<input type="hidden" name="sent" value="1" />
			</table>
		</form>
	</div>
	<div class="bottom"></div>
</div>
<?php } ?>