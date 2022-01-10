<?PHP
  if($_SESSION['user_admin']>=$adminRights['ip_suche']) {
    if(!isset($_GET['filter']) && empty($_GET['filter'])) {
      $_GET['filter']='';
      $url_extension = '';
    }
    else {
      $url_extension = '&amp;filter='.$_GET['filter'];
    }
?>
<h2>Admin - lista IP-urilor</h2>
  <p><br/>&nbsp;&nbsp;&nbsp;&nbsp;Aceast&#259; pagin&#259; con&#355;ine IP-urile cele mai recente autentificate de c&#259;tre caractere / conturi.<br/></p>
  <form action="index.php?s=admin&a=iplist" method="GET">
  <input type="hidden" name="s" value="admin"/>
  <input type="hidden" name="a" value="iplist"/>
  <table>
    <tr>
      <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;C&#259;utare (IP, sau o parte din IP):</th>
      <td class="topLine"><input type="text" name="filter" value="<?PHP if(isset($_GET['filter'])) echo $_GET["filter"]; ?>" size="20" maxlength="16"/></td>
      <td class="topLine"><input type="submit" name="submit" value="Cauta"/></td>
    </tr>
  </table>
  </form>
  <table>
    <tr>
      <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
      <th class="topLine">Caracter</th>
      <th class="topLine">ID cont</th>
      <th class="topLine">Cont</th>
      <th class="topLine">IP</th>
      <th class="topLine">Editare</th>
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
    echo'&nbsp;&nbsp;&nbsp;&nbsp;Filtru curent: &laquo;<b>'.$_GET['filter'].'</b>&raquo;';
    echo'<p>&nbsp;&nbsp;&nbsp;&nbsp;Pagina: ';
    for($i=1;$i<=$test[0];$i++) {
    
      echo'<a href="index.php?s=admin&a=iplist'.$url_extension.'&p='.$i.'">';
      if($aktSeite==$i) { echo'<u>'.$i.'</u>'; }
      else { echo $i; }
      echo'</a> ';
    
    }
    echo'</p><br/>';
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
      <td class=\"$zF\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$getAccs->account_id."</td>\n
      <td class=\"$zF\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"index.php?s=admin&a=users&acc=".$getAccs->account_id."\">".$getAccs->login."</a></td>\n
      <td class=\"$zF\">".$getAccs->id."</td>\n
      <td class=\"$zF\">&nbsp;&nbsp;&nbsp;<a href=\"index.php?s=admin&a=char&id=".$getAccs->id."\">".$getAccs->name."</a>&nbsp;&nbsp;&nbsp;</td>\n
      <td class=\"$zF\"><a href=\"index.php?s=admin&a=iplist&filter=".$getAccs->ip."\">".$getAccs->ip."</a> <a href=\"index.php?s=admin&a=ipban&ip=".$getAccs->ip."\">[baneaz&#259;]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>\n
      <td class=\"$zF\"><a href=\"index.php?s=admin&a=users&acc=".$getAccs->account_id."\">Selectare</a></td>\n
      </tr>\n";
      $x++;
    }
  ?>
  </table>
<?PHP
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?><br/>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>