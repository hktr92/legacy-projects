<?PHP
  if($_SESSION['user_admin']>=$adminRights['acc_suche']) {
  
    if(!isset($_GET['filter']) && empty($_GET['filter'])) {
      $_GET['filter']='';
      $url_extension = '';
    }
    else {
      $url_extension = '&amp;filter='.$_GET['filter'];
    }
?>
<h2>Administrare - lista conturilor</h2>
<p> <br/></p>
  <form action="index.php" method="GET">
  <input type="hidden" name="s" value="admin"/>
  <input type="hidden" name="a" value="user"/>
  <table><th>C&#259;utare (Cont / ID):
    <tr>
      </th>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="filter" value="<?PHP if(isset($_GET['filter'])) echo $_GET["filter"]; ?>" size="20" maxlength="16"/></td>
      <td><input type="submit" name="submit" value="Cauta"/></td>
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
    echo'<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Filtru curent: &laquo;<b>'.$_GET['filter'].'</b>&raquo;';
    echo'<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pagina: ';
    for($i=1;$i<=$test[0];$i++) {
    
      echo'<a href="index.php?s=admin&a=user'.$url_extension.'&p='.$i.'">';
      if($aktSeite==$i) { echo'<u>'.$i.'</u>'; }
      else { echo $i; }
      echo'</a> ';
    
    }
    echo'</p><br/>';
    
  ?>
  <table>
    <tr>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
      <th>Cont</th>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;Stare</th>
      <th>E-Mail</th>
      <th>&#206;nregistrat</th>
      <th>Prezentare</th>
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
      <td class=\"$zF\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$getAccs->id."</td>\n
      <td class=\"$zF\">&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"index.php?s=admin&a=users&acc=".$getAccs->id."\">".$getAccs->login."</a></td>\n
      <td class=\"$zF\" style=\"color:$accZustand;\">&nbsp;&nbsp;&nbsp;&nbsp;".$getAccs->status."</td>\n
      <td class=\"$zF\">&nbsp;&nbsp;&nbsp;&nbsp;".$getAccs->email."&nbsp;&nbsp;&nbsp;&nbsp;</td>\n
      <td class=\"$zF\">".$getAccs->create_time."&nbsp;&nbsp;&nbsp;&nbsp;</td>\n
      <td class=\"$zF\"><a href=\"index.php?s=admin&a=users&acc=".$getAccs->id."\">Selecteaz&#259;</a></td>\n
      </tr>\n";
      $x++;
    }
  ?>
  </table>
<?PHP
  }
  else {
    echo'<p class="meldung">>Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?><br/>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>