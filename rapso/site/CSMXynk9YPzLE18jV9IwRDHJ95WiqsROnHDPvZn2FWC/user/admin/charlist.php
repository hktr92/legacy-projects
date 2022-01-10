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
<h2>Administrare - lista caracterelor</h2>
<p> &nbsp;&nbsp;&nbsp;Pe aceast&#259; pagin&#259; pute&#355;i c&#259;uta un anumit caracter. <br/></p>
  <form action="index.php" method="GET">
  <input type="hidden" name="s" value="admin"/>
  <input type="hidden" name="a" value="charlist"/>
  <table>
    <tr>
      <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&#259;utare (Caracter sau ID-ul caracterului):</th>
      <td class="topLine"><input type="text" name="filter" value="<?PHP if(isset($_GET['filter'])) echo $_GET["filter"]; ?>" size="20" maxlength="16"/></td>
      <td class="topLine"><input type="submit" name="submit" value="Cauta"/></td>
    </tr>
  </table>
  </form>
  <table>
    <tr>
      <th class="topLine"><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
      <th class="topLine"><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Caracter</th>
      <th class="topLine"><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID cont</th>
      <th class="topLine"><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cont</th>
      <th class="topLine"><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IP</th>
      <th class="topLine"><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informa&#355;ii</th>
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
    echo'&nbsp;&nbsp;Filtru curent: &laquo;<b>'.$_GET['filter'].'</b>&raquo;';
    echo'<p>&nbsp;&nbsp;Pagina: ';
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
        $accountInfo = 'Nici un cont.';
      }
      else {
        $accountInfo = "<a href=\"index.php?s=admin&a=users&acc=".$getAccs->account_id."\" style=\"color:$accZustand;\">".$getAccs->login."</a>";
      }
      
      echo"<tr>
      <td class=\"$zF\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$getAccs->id."</td>\n
      <td class=\"$zF\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"index.php?s=admin&a=char&id=".$getAccs->id."\">".$getAccs->name."</a></td>\n
      <td class=\"$zF\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$getAccs->account_id."</td>\n
      <td class=\"$zF\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$accountInfo."</td>\n
      <td class=\"$zF\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$getAccs->ip."</td>\n
      <td class=\"$zF\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"index.php?s=admin&a=char&id=".$getAccs->id."\">Arat&#259;</a></td>\n
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
?><br/><br/>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>