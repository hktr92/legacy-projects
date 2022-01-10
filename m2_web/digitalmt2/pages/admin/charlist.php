<?PHP
  if($_SESSION['user_admin']>=$adminRights['char_suche']) {
  
    if(!isset($_GET['filter']) && empty($_GET['filter'])) {
      $_GET['filter']='';
      $url_extension = '';
    }
    else {
      $url_extension = '&amp;filter='.$_GET['filter'];
    }
?>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Charliste</h3>
        <div class="big-line"></div>
  <p>Auf dieser Seite kann nach bestimmten Charakteren gesucht werden.<br/>
  Die Suche filtert nach Charname oder CharID und gibt die zugeh&ouml;rigen Accounts aus.</p>
  <form action="index.php" method="GET">
  <input type="hidden" name="s" value="admin"/>
  <input type="hidden" name="a" value="charlist"/>
  <table>
    <tr>
      <th class="topLine">Suche (Charakter oder CharID):</th>
      <td class="topLine"><input type="text" name="filter" value="<?PHP if(isset($_GET['filter'])) echo $_GET["filter"]; ?>" size="40" maxlength="16"/></td>
      <td class="topLine"><input type="submit" name="submit" value="suchen"/></td>
    </tr>
  </table>
  </form>
  <table style="width: 100%;">
    <tr>
      <th class="topLine">CharID</th>
      <th class="topLine">Charakter</th>
      <th class="topLine">AccountID</th>
      <th class="topLine">Account</th>
      <th class="topLine">IP</th>
      <th class="topLine">Char-Infos</th>
    </tr>
   <?PHP
    
    $sqlCmd="SELECT COUNT(*) AS anzEintr 
    FROM player.player 
    LEFT JOIN account.account 
    ON account.id=player.account_id
    WHERE player.id='".mysql_real_escape_string($_GET['filter'])."'
    OR player.name LIKE '%".mysql_real_escape_string($_GET['filter'])."%'
    ORDER BY player.name ASC";
    
    $sqlQry = mysql_query($sqlCmd,$sqlServ);
    $getAnz = mysql_fetch_object($sqlQry);
    $cntEintraege = $getAnz->anzEintr;
    if(isset($_GET['p'])) {
      $aktSeite = (!checkInt($_GET['p'])) ? 0 : $_GET['p'];
    }
    else {
      $aktSeite=0;
    }
    
    if($aktSeite==0) $aktSeite=1;
    $test = calcPages($cntEintraege,$aktSeite,$serverSettings['page_entries']);
    
    $sqlCmd="SELECT player.name,player.id,player.ip,account.id AS account_id, account.login, account.status
    FROM player.player 
    LEFT JOIN account.account 
    ON account.id=player.account_id
    WHERE player.id='".mysql_real_escape_string($_GET['filter'])."'
    OR player.name LIKE '%".mysql_real_escape_string($_GET['filter'])."%'
    ORDER BY player.name ASC 
    LIMIT ".$test[1].",".$serverSettings['page_entries'];
      
    $sqlQry = mysql_query($sqlCmd,$sqlServ);
    echo'Aktueller Filter: &laquo;<b>'.$_GET['filter'].'</b>&raquo;';
    echo'<p>Seite: ';
    for($i=1;$i<=$test[0];$i++) {
    
      echo'<a href="index.php?s=admin&a=charlist'.$url_extension.'&p='.$i.'">';
      if($aktSeite==$i) { echo'<u>'.$i.'</u>'; }
      else { echo $i; }
      echo'</a> ';
    
    }
    echo'</p>';
    $x=0;
    while($getAccs=mysql_fetch_object($sqlQry)) 
    {
      if(($x%2)==0) 
      { 
        $zF="tdunkel"; 
      }
      else 
      { 
        $zF="thell"; 
      }
      
      if(isset($getAccs->status)) {
        if($getAccs->status=='OK') { $accZustand="#026113"; }
        elseif($getAccs->status=='BLOCK') { $accZustand="#AA0319"; }
      }
      else {
        $accZustand="#000000";
      }
      
      if(empty($getAccs->login)) {
        $accountInfo = 'Kein Account';
      }
      else {
        $accountInfo = "<a href=\"index.php?s=admin&a=users&acc=".$getAccs->account_id."\" style=\"color:$accZustand;\">".$getAccs->login."</a>";
      }
      
      echo"<tr>
      <td class=\"$zF\">".$getAccs->id."</td>\n
      <td class=\"$zF\"><a href=\"index.php?s=admin&a=char&id=".$getAccs->id."\">".$getAccs->name."</a></td>\n
      <td class=\"$zF\">".$getAccs->account_id."</td>\n
      <td class=\"$zF\">".$accountInfo."</td>\n
      <td class=\"$zF\">".$getAccs->ip."</td>\n
      <td class=\"$zF\"><a href=\"index.php?s=admin&a=char&id=".$getAccs->id."\">Anzeigen</a></td>\n
      </tr>\n";
      $x++;
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