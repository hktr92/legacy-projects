<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Command Log</h3>
        <div class="big-line"></div><?PHP
  if($_SESSION['user_admin']>=$adminRights['itemsuche']) {
    if(isset($_GET['char']) && !empty($_GET['char'])) $_SESSION['search_char']=$_GET['char'];
	$warningCommands = array("m");
?>
<table width=99% align=center>
<td><tr><td class="topLine"><font style='color: black'>User ID</font></td><td class="topLine"><font style='color: black'>Username</font></td><td class="topLine"><font style='color: black'>IP</font></td><td class="topLine"><font style='color: black'>Command</font></td><td class="topLine"><font style='color: black'>Date</font></td></tr>
<?php
$sqlCmd="SELECT `userid`, `ip`, `username`, `command`, `date` FROM `log`.`command_log` WHERE `username` NOT LIKE '[SA]%'";
$sqlQry=mysql_query($sqlCmd,$sqlServ);
for($i = 0; $i < mysql_num_rows($sqlQry); $i++)
{
	$userid = mysql_result($sqlQry, $i, 'userid');
	$username = mysql_result($sqlQry, $i, 'username');
	$ip = mysql_result($sqlQry, $i, 'ip');
	$command = mysql_result($sqlQry, $i, 'command');
	$date = mysql_result($sqlQry, $i, 'date');
	$commandSplit = explode(" ", $command);
	$found = 0;
	foreach($warningCommands as $warningCommand)
	{
		if($warningCommand == $commandSplit[0])
		{
			$found = 1;
		}
	}
	
	if($i%2)
	{
		$color = "tdunkel";
	} else { 
		$color = "thell";
	}
	
	$command = str_replace("�", "&ouml;", $command);
	$command = str_replace("�", "&uuml;", $command);
	$command = str_replace("�", "&auml;", $command);
	$command = str_replace("�", "&Ouml;", $command);
	$command = str_replace("�", "&Uuml;", $command);
	$command = str_replace("�", "&Auml;", $command);
	$command = str_replace("�", "&szlig;", $command);
	$command = str_replace("�", "&euro;", $command);
	$command = str_replace("&", "&amp;", $command);
	$command = str_replace("<", "&lt;", $command);
	$command = str_replace(">", "&gt;", $command);
	$command = str_replace("��", "&quot;", $command);
	$command = str_replace("�", "&copy;", $command);
	
	if($found == 1)
	{
		echo "<tr>";
		echo "<td class=\"" . $color . "\" style='color: red'>" . trim($userid) . "</td>";
		echo "<td class=\"" . $color . "\" style='color: red'>" . trim($username) . "</td>";
		echo "<td class=\"" . $color . "\" style='color: red'>" . trim($ip) . "</td>";
		echo "<td class=\"" . $color . "\" style='color: red'>" . trim($command) . "</td>";
		echo "<td class=\"" . $color . "\" style='color: red'>" . trim($date) . "</td>";
		echo "<tr>";
	} else {
		echo "<tr>";
		echo "<td class=\"" . $color . "\"><font style='color: black'>" . trim($userid) . "</font></td>";
		echo "<td class=\"" . $color . "\"><font style='color: black'>" . trim($username) . "</font></td>";
		echo "<td class=\"" . $color . "\"><font style='color: black'>" . trim($ip) . "</font></td>";
		echo "<td class=\"" . $color . "\"><font style='color: black'>" . trim($command) . "</font></td>";
		echo "<td class=\"" . $color . "\"><font style='color: black'>" . trim($date) . "</font></td>";
		echo "<tr>";
	}
}
?>
</table>
<?PHP
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>    </div>
    <div class="bottom"></div>
</div>