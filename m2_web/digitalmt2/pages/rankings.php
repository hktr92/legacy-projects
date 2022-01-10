<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Clasament</h3>
        <div class="big-line"></div>
<center>
<?PHP
  $CPSeite = 50;
  $markierteZeile=0;
  if(isset($_GET['p'])) {
    if(!checkInt($_GET['p']) || !($_GET['p']>0)) $aSeite = 1;
    else $aSeite = $_GET['p'];
  }
  else { $aSeite = 1; }
  
  if(isset($_POST['suche']) && $_POST['suche']=='suchen') {
    if(!empty($_POST['charakter'])) {
      $sqlCmd="SELECT id, name, level, exp, empire, guild_name, rang
      FROM (
      
        SELECT id, name, level, exp, empire, guild_name, @num := @num +1 AS rang
        FROM (
        
          SELECT player.id, player.name, player.level, player.exp, player_index.empire, guild.name AS guild_name, @num :=0
          FROM player.player
          LEFT JOIN player.player_index ON player_index.id = player.account_id
          LEFT JOIN player.guild_member ON guild_member.pid = player.id
          LEFT JOIN player.guild ON guild.id = guild_member.guild_id
          INNER JOIN account.account ON account.id=player.account_id
          WHERE player.name NOT LIKE '[%]%'  AND
		  account.status!='BLOCK'
          ORDER BY player.level DESC , player.exp DESC
          
        ) AS t1
        
      ) AS t2
      
      WHERE name LIKE '".mysql_real_escape_string($_POST['charakter'])."' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlServ);
      if(mysql_num_rows($sqlQry)>0) {
      
        $getRang = mysql_fetch_object($sqlQry);
        $aSeite = ceil($getRang->rang/$CPSeite);
        $markierteZeile = $getRang->rang;
      }
      
    }
    
  }
  
  $sqlCmd = "SELECT COUNT(*) as summeChars  
  FROM player.player 
  LEFT JOIN player.player_index 
  ON player_index.id=player.account_id 
  LEFT JOIN player.guild_member 
  ON guild_member.pid=player.id 
  LEFT JOIN player.guild 
  ON guild.id=guild_member.guild_id
  INNER JOIN account.account 
  ON account.id=player.account_id
  WHERE player.name NOT LIKE '[%]%'  AND account.status!='BLOCK'
  ORDER BY player.level DESC, player.exp DESC";
  
  $sqlQry = mysql_query($sqlCmd,$sqlServ);
  
  $getSum = mysql_fetch_object($sqlQry);
  $cSeite = calcPages($getSum->summeChars,$aSeite,$CPSeite);
  
?>

<form action="index.php?s=rankings" method="POST">
  <table>
    <tr>
      <th class="topLine">Caută Caracter:</th>
      <td class="thell" style="text-align:center;"><input class="txt" type="text" name="charakter" maxlength="20" size="20"/></td>
      <td class="tdunkel" style="text-align:center;"><input class="button1" type="submit" name="suche" value="suchen" maxlength="20" size="20"/></td>
    </tr>
  </table>
</form>
<?PHP
  $maxRange = 5;
  $maxStep = 15;
  if(($aSeite-$maxRange)>0) $sStart = $aSeite-$maxRange;
  else $sStart = 1;
  if(($aSeite+$maxRange)<=$cSeite[0]) $sEnde = $aSeite+$maxRange;
  else $sEnde = $cSeite[0];
  
  echo '<table">
  <tr>
  <td class="tdunkel">';
  if(($aSeite-$maxStep)>0) echo '<a href="index.php?s=rankings&p='.($aSeite-$maxStep).'">'.($aSeite-$maxStep).'</a> &laquo;';
  else echo '<a href="index.php?s=rankings&p=1">1</a> &laquo;';
  echo'</td>';
  
  for($i=$sStart;$i<=$sEnde;$i++) {
    $sKlasse = ($i==$aSeite) ? "topLine" : "thell";
    echo'<td class="'.$sKlasse.'" style="text-align:center;">';
    echo'<a href="index.php?s=rankings&p='.$i.'">'.$i.'</a>';
    echo'</td>';
  }
  
  echo'<td class="tdunkel" style="text-align:right;">';
  if(($aSeite+$maxStep)<=$cSeite[0]) echo '&raquo; <a href="index.php?s=rankings&p='.($aSeite+$maxStep).'">'.($aSeite+$maxStep).'</a>';
  else echo '&raquo; <a href="index.php?s=rankings&p='.$cSeite[0].'">'.$cSeite[0].'</a>';
  echo'</td>';
  echo'</table>';
?>
<table width="100%">
<tr>
  <th class="topLine">Locul</th>
  <th class="topLine">Caracter</th>
  <th class="topLine">Level</th>
  <th class="topLine">EXP</th>
  <th class="topLine">Breaslă</th>
  <th class="topLine">Regat</th>
</tr>
<?PHP
  $sqlCmd = "SELECT player.id,player.name,player.level,player.exp,player_index.empire,guild.name AS guild_name 
  FROM player.player 
  LEFT JOIN player.player_index 
  ON player_index.id=player.account_id 
  LEFT JOIN player.guild_member 
  ON guild_member.pid=player.id 
  LEFT JOIN player.guild 
  ON guild.id=guild_member.guild_id
  INNER JOIN account.account 
  ON account.id=player.account_id
  WHERE player.name NOT LIKE '[%]%'  AND account.status!='BLOCK'  AND account.status!=''
  ORDER BY player.level DESC, player.exp DESC 
  LIMIT ".$cSeite[1].",".$CPSeite;
  //echo $sqlCmd;
  $sqlQry = mysql_query($sqlCmd,$sqlServ);
  $x=$cSeite[1]+1;
  while($getPlayers = mysql_fetch_object($sqlQry)) {
    $zF = ($x%2==0) ? "thell" : "tdunkel";
    if(checkInt($markierteZeile) && $markierteZeile==$x) { $zF = "tred"; }
    echo "<tr>";
    echo "<td class=\"$zF\">".$x."</td>";
    echo "<td class=\"$zF\">".$getPlayers->name."</td>";
    echo "<td class=\"$zF\">".$getPlayers->level."</td>";
    echo "<td class=\"$zF\">".$getPlayers->exp."</td>";
    echo "<td class=\"$zF\">".$getPlayers->guild_name."</td>";
    echo "<td class=\"$zF\">";
    if(!empty($getPlayers->empire)) {
      echo '<img src="img/reiche/'.$getPlayers->empire.'_kl.jpg" title="Reich" alt="Reich"/>';
    }
    echo "</td>";
    echo "</tr>";
    
    $x++;
    
  }
?>
</table></center>
    </div>
    <div class="bottom"></div>
</div>
