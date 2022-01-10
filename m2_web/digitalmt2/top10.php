<?php
//include ("inc/mysql.php");

$handle = fopen("top10/lastsave.txt", "a+");
$content = @fread($handle, @filesize("top10/lastsave.txt"));
fclose($handle);

$aktuell = time();

if($content + 60 * 60 >= $aktuell)
{
	$handle = fopen("top10/save.txt", "a+");
	$content = "";
	$content = @fread($handle, @filesize("top10/save.txt"));
	echo $content;
	fclose($handle);
} else {
	
	if($withgm == "0")
	{
		$sql = "SELECT player.id,player.name,player.level,player.exp,player_index.empire,guild.name AS guild_name 
	  FROM player.player 
	  LEFT JOIN player.player_index 
	  ON player_index.id=player.account_id 
	  LEFT JOIN player.guild_member 
	  ON guild_member.pid=player.id 
	  LEFT JOIN player.guild 
	  ON guild.id=guild_member.guild_id
	  INNER JOIN account.account 
	  ON account.id=player.account_id
	  WHERE player.name NOT LIKE '[%]%' AND account.status!='BLOCK' AND account.status!=''
	  ORDER BY player.level DESC, player.exp DESC 
	  LIMIT 10";
	}
	else
	{
		$sql = "SELECT player.id,player.name,player.level,player.exp,player_index.empire,guild.name AS guild_name 
	  FROM player.player 
	  LEFT JOIN player.player_index 
	  ON player_index.id=player.account_id 
	  LEFT JOIN player.guild_member 
	  ON guild_member.pid=player.id 
	  LEFT JOIN player.guild 
	  ON guild.id=guild_member.guild_id
	  INNER JOIN account.account 
	  ON account.id=player.account_id
	  WHERE player.name NOT LIKE '[%]%' AND account.status!='BLOCK' AND account.status!=''
	  ORDER BY player.level DESC, player.exp DESC 
	  LIMIT 10";
	}
	$i = "0" ;
	$ergebnis = mysql_query($sql);
	
	@unlink("top10/lastsave.txt");
	@unlink("top10/save.txt");
	$handle = fopen("top10/lastsave.txt", "a+");
	fwrite($handle, time());
	fclose($handle);
	$content = '<div class="table">';
	$content .= '<div class="row">
                        <div class="cell-1">#</div>
                        <div class="cell-2">Name</div>
                        <div class="cell-3">Lv</div>
                     </div>';
	while($row = mysql_fetch_object($ergebnis))
	{
	   $i = $i + 1 ;
	   $content .= '
	   <div class="row-highlight">
           <div class="cell-1">' . $i . '</div>
	   <div class="cell-2">' . $row->name . '</div>
	   <div class="cell-3">' . $row->level . '</div></div>';  
	}
	$content .= '</div>';
	$handle = fopen("top10/save.txt", "a+");
	fwrite($handle, $content);
	fclose($handle);
	
	echo $content;
   }
?>