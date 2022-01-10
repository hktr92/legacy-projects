<?PHP
  if($_SESSION['user_admin']>=2) {
?>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Middleman Passwort Change</h3>
        <div class="big-line"></div>
		<?php 
			if($_POST["sent"]==1) 
			{ 
				$username = mysql_real_escape_string($_POST['username']);
				$oldpassword = mysql_real_escape_string($_POST['oldpassword']);
				$email = mysql_real_escape_string($_POST['email']);
				$newpassword = mysql_real_escape_string($_POST['newpassword']);
				$sql = "SELECT `id` FROM `account`.`account` WHERE `login`='" . $username . "' and `password`=PASSWORD('" . $password . "') and `email`='" . $email . "'";
				$result = mysql_query($sql, $sqlServ);
				if(mysql_num_rows($result) == 1) {
					$sql = "UPDATE `account`.`account` SET `password`=PASSWORD('" . $newpassword . "') WHERE `login`='" . $username . "'";
					if(mysql_query($sql, $sqlServ)) {
						echo "<b>Das Passwort wurde erfolgreich geändert</b>";
					} else {
						echo "<b>Es ist ein unbekannter Fehler aufgetreten.</b>";
					}
				} else {
					echo "<b>Eine oder mehrere der angebenen Daten stimmen nicht.</b>";
				}
			}			
		?>
		<form action="index.php?s=admin&a=middleman_password_change" method="POST">
			<table>
				<tr>
					<td>Account ID:</td>
					<td><input type="text" name="username" /></td>
				</tr>
				<tr>
					<td>Passwort:</td>
					<td><input type="text" name="oldpassword" /></td>
				</tr>
				<tr>
					<td>E-Mail:</td>
					<td><input type="text" name="email" /></td>
				</tr>
				<tr>
					<td>Neues Password:</td>
					<td><input type="text" name="newpassword" /></td>
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