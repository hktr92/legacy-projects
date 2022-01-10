<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>IP-Liste</h3>
        <div class="big-line"></div><?PHP
  if($_SESSION['user_admin']>=$adminRights['ip_suche']) {
    if(!isset($_GET['filter']) && empty($_GET['filter'])) {
      $_GET['filter']='';
      $url_extension = '';
    }
    else {
      $url_extension = '&amp;filter='.$_GET['filter'];
    }
?>

  <p>Auf dieser Seite können die zuletzt eingeloggten IPs von Charakteren nachvollzogen werden.<br/>
  Die Suche filtert nach IP-Adresse und gibt jeweils die entsprechenden Accounts mit aus.</p>
  <form action="index.php?s=admin&a=iplist" method="GET">
  <input type="hidden" name="s" value="admin"/>
  <input type="hidden" name="a" value="iplist"/>
  <table>
    <tr>
      <th class="topLine">Suche (IP, oder Teil der IP):</th>
      <td class="topLine"><input type="text" name="filter" value="<?PHP if(isset($_GET['filter'])) echo $_GET["filter"]; ?>" size="40" maxlength="16"/></td>
      <td class="topLine"><input type="submit" name="submit" value="suchen"/></td>
    </tr>
  </table>
  </form>
  <table style='width: 100%;'>
    <tr>
      <th class="topLine">AccountID</th>
      <th class="topLine">Account</th>
      <th class="topLine">CharID</th>
      <th class="topLine">Charakter</th>
      <th class="topLine">IP</th>
      <th class="topLine">Bearbeiten</th>
    </tr>
   <?PHP
    
    $sqlCmd = "SELECT COUNT(*) AS anzEintr 
    FROM player.player 
    INNER JOIN account.account 
    ON account.id=player.account_id
    WHERE player.ip LIKE '%".mysql_real_escape_string($_GET['filter'])."%'
    ORDER BY account.login ASC";
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
    
    $sqlCmd = "SELECT player.name,player.id,account.id AS account_id,account.login,player.ip
    FROM player.player 
    INNER JOIN account.account 
    ON account.id=player.account_id
    WHERE player.ip LIKE '%".mysql_real_escape_string($_GET['filter'])."%'
    ORDER BY account.login ASC
    LIMIT ".$test[1].",".$serverSettings['page_entries'];
      
    $sqlQry = mysql_query($sqlCmd,$sqlServ);
    echo'Aktueller Filter: &laquo;<b>'.$_GET['filter'].'</b>&raquo;';
    echo'<p>Seite: ';
    for($i=1;$i<=$test[0];$i++) {
    
      echo'<a href="index.php?s=admin&a=iplist'.$url_extension.'&p='.$i.'">';
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
      
      /*if($getAccs->status=='OK') { $accZustand="#026113"; }
      elseif($getAccs->status=='BLOCK') { $accZustand="#AA0319"; }*/
      
      echo"<tr>
      <td class=\"$zF\">".$getAccs->account_id."</td>\n
      <td class=\"$zF\"><a href=\"index.php?s=admin&a=users&acc=".$getAccs->account_id."\">".$getAccs->login."</a></td>\n
      <td class=\"$zF\">".$getAccs->id."</td>\n
      <td class=\"$zF\"><a href=\"index.php?s=admin&a=char&id=".$getAccs->id."\">".$getAccs->name."</a></td>\n
      <td class=\"$zF\"><a href=\"index.php?s=admin&a=iplist&filter=".$getAccs->ip."\">".$getAccs->ip."</a> <a href=\"index.php?s=admin&a=ipban&ip=".$getAccs->ip."\">[ban]</a></td>\n
      <td class=\"$zF\"><a href=\"index.php?s=admin&a=users&acc=".$getAccs->account_id."\">Auswählen</a></td>\n
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