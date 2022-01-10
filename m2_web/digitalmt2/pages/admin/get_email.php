<?PHP
  if($_SESSION['user_admin']>=2) {
?>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>E-Mail Adresse</h3>
        <div class="big-line"></div>
		<?php 
			if($_POST["sent"]==1) 
			{ 
				$username = mysql_real_escape_string($_POST['username']);
				$password = mysql_real_escape_string($_POST['password']);n
				$sql = "SELECT `email` FROM `account`.`account` WHERE `login`='" . $username . "' and `password`=PASSWORD('" . $password . "')";
				$result = mysql_query($sql, $sqlServ);
				if(mysql_num_rows($result) == 1) {
					echo "<b>E-Mail Adresse: " . mysql_result($result, 0, "email") . "</b><br />";
				} else {
					echo "<b>Eine oder mehrere der angebenen Daten stimmen nicht.</b>";
				}
			}			
		?>
		<form action="index.php?s=admin&a=get_email" method="POST">
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
					<td colspan='2'><input type="submit" value="Auslesen" /></td>
				</tr>
				<input type="hidden" name="sent" value="1" />
			</table>
		</form>
	</div>
	<div class="bottom"></div>
</div>
<?php } ?>