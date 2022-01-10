<?php
$handle = fopen("accstatus/lastsave.txt", "a+");
$content = @fread($handle, @filesize("accstatus/lastsave.txt"));
fclose($handle);

$aktuell = time();

if($content + 60 * 60 >= $aktuell)
{
	$handle = fopen("accstatus/save.txt", "a+");
	$content = @fread($handle, @filesize("accstatus/save.txt"));
	fclose($handle);
	echo $content;
} else { 
	include("inc/mysql.php");
	mysql_connect($host,$user,$pass);
	mysql_select_db("player");
	$chars = "SELECT * from player";
	$charsquery = mysql_query($chars);
	$charszahl = mysql_num_rows($charsquery);
	mysql_select_db("account");
	$accs = "SELECT * from account";
	$accsquery = mysql_query($accs);$accszahl = mysql_num_rows($accsquery);
	mysql_select_db("player");
	$guild = "SELECT * from guild";
	$guildquery = mysql_query($guild);$guildzahl = mysql_num_rows($guildquery);
	mysql_select_db("player");
	$item = "SELECT * from item";
	$itemquery = mysql_query($item);$itemzahl = mysql_num_rows($itemquery);
	$bluesql = "SELECT * FROM `player`.`player_index` WHERE `empire`='3'";
	$resultblue = mysql_query($bluesql);
	$blau = 0;
	for($i=0;$i<mysql_num_rows($resultblue);$i++)
	{
		if(mysql_result($resultblue, $i, 'pid1') == 0) { $pid1 = 0; } else { $pid1 = 1; }
		if(mysql_result($resultblue, $i, 'pid2') == 0) { $pid2 = 0; } else { $pid2 = 1; }
		if(mysql_result($resultblue, $i, 'pid3') == 0) { $pid3 = 0; } else { $pid3 = 1; }
		if(mysql_result($resultblue, $i, 'pid4') == 0) { $pid4 = 0; } else { $pid4 = 1; }
		$blau = $blau + $pid1 + $pid2 + $pid3 + $pid4;
	}
	$gelbsql = "SELECT * FROM `player`.`player_index` WHERE `empire`='2'";
	$resultgelb = mysql_query($gelbsql);
	$gelb = 0;
	for($i=0;$i<mysql_num_rows($resultgelb);$i++)
	{
		if(mysql_result($resultgelb, $i, 'pid1') == 0) { $pid1 = 0; } else { $pid1 = 1; }
		if(mysql_result($resultgelb, $i, 'pid2') == 0) { $pid2 = 0; } else { $pid2 = 1; }
		if(mysql_result($resultgelb, $i, 'pid3') == 0) { $pid3 = 0; } else { $pid3 = 1; }
		if(mysql_result($resultgelb, $i, 'pid4') == 0) { $pid4 = 0; } else { $pid4 = 1; }
		$gelb = $gelb + $pid1 + $pid2 + $pid3 + $pid4;
	}
	
	@unlink("accstatus/lastsave.txt");
	@unlink("accstatus/save.txt");
	$handle = fopen("accstatus/lastsave.txt", "a+");
	fwrite($handle, time());
	fclose($handle);
	
	$return .= '<table width="200" border="0" class="status">';
	$return .= '<tr>';
    $return .= '<td width="70%">Accounts</td>';
    $return .= '<td width="8%">&raquo;</td>';
    $return .= '<td width="26%" class="info">'.$accszahl.'</td>';
	$return .= '</tr>';
	$return .= '</table>';
	$return .= '<div class="sb-sep"></div>';
	$return .= '<table width="200" border="0" class="status">';
	$return .= '<tr>';
    $return .= '<td width="70%">Charaktere</td>';
    $return .= '<td width="8%">&raquo;</td>';
    $return .= '<td width="26%" class="info">'.$charszahl.'</td>';
	$return .= '</tr>';
	$return .= '</table>';
	$return .= '<div class="sb-sep"></div>';
	$return .= '<table width="200" border="0" class="status">';
	$return .= '<tr>';
    $return .= '<td width="70%">Gilden:</td>';
    $return .= '<td width="8%">&raquo;</td>';
    $return .= '<td width="26%" class="info">'.$guildzahl.'</td>';
	$return .= '</tr>';
	$return .= '</table>';
	
	echo $return;
	
	$handle = fopen("accstatus/save.txt", "a+");
	fwrite($handle, $return);
	fclose($handle);
}
?>