<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Userliste</h3>
        <div class="big-line"></div><?PHP
  if($_SESSION['user_admin']>=$adminRights['acc_suche']) {
  
    if(!isset($_GET['filter']) && empty($_GET['filter'])) {
      $_GET['filter']='';
      $url_extension = '';
    }
    else {
      $url_extension = '&amp;filter='.$_GET['filter'];
    }
?>

  <p>Hier k&ouml;nnen Accounts bzw. Account IDs gesucht werden.<br/> Wenn eine leere Suche eingegeben wird, kann wieder die komplette Liste angezeigt werden.</p>
  <form action="index.php" method="GET">
  <input type="hidden" name="s" value="admin"/>
  <input type="hidden" name="a" value="user"/>
  <table>
    <tr>
      <th class="topLine">Suche (Account / Account-ID):</th>
      <td class="topLine"><input type="text" name="filter" value="<?PHP if(isset($_GET['filter'])) echo $_GET["filter"]; ?>" size="40" maxlength="16"/></td>
      <td class="topLine"><input type="submit" name="submit" value="suchen"/></td>
    </tr>
  </table>
  </form>
  <?PHP
    
    $sqlCmd = "SELECT COUNT(*) AS anzEintr FROM account.account WHERE login LIKE '%".mysql_real_escape_string($_GET['filter'])."%' OR id='".mysql_real_escape_string($_GET['filter'])."' ORDER BY login ASC";
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
    
    $sqlCmd = "SELECT id,login,email,create_time,status FROM account.account WHERE login LIKE '%".mysql_real_escape_string($_GET['filter'])."%' OR id='".mysql_real_escape_string($_GET['filter'])."' ORDER BY login ASC LIMIT ".$test[1].",".$serverSettings['page_entries'];
    
    $sqlQry = mysql_query($sqlCmd,$sqlServ);
    echo'Aktueller Filter: &laquo;<b>'.$_GET['filter'].'</b>&raquo;';
    echo'<p>Seite: ';
    for($i=1;$i<=$test[0];$i++) {
    
      echo'<a href="index.php?s=admin&a=user'.$url_extension.'&p='.$i.'">';
      if($aktSeite==$i) { echo'<u>'.$i.'</u>'; }
      else { echo $i; }
      echo'</a> ';
    
    }
    echo'</p>';
    
  ?>
  <table style="width: 100%;">
    <tr>
      <th class="topLine">ID</th>
      <th class="topLine">Account</th>
      <th class="topLine">Status</th>
      <th class="topLine">E-Mail</th>
      <th class="topLine">Angemeldet seit</th>
      <th class="topLine">&Uuml;bersicht</th>
    </tr>
  <?PHP    
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
      
      if($getAccs->status=='OK') { $accZustand="#026113"; }
      elseif($getAccs->status=='BLOCK') { $accZustand="#AA0319"; }
      
      echo"<tr>
      <td class=\"$zF\">".$getAccs->id."</td>\n
      <td class=\"$zF\"><a href=\"index.php?s=admin&a=users&acc=".$getAccs->id."\">".$getAccs->login."</a></td>\n
      <td class=\"$zF\" style=\"color:$accZustand;\">".$getAccs->status."</td>\n
      <td class=\"$zF\">".$getAccs->email."</td>\n
      <td class=\"$zF\">".$getAccs->create_time."</td>\n
      <td class=\"$zF\"><a href=\"index.php?s=admin&a=users&acc=".$getAccs->id."\">Auswählen</a></td>\n
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