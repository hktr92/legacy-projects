<?PHP
  if($_SESSION['user_admin']>=$adminRights['banlist']) {
?>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Banliste</h3>
        <div class="big-line"></div>
                
  <form action="index.php?s=admin&a=banliste" method="POST">
  <table>
    <tr>
      <th class="topLine">Suche (Account / Account-ID):</th>
      <td class="topLine"><input type="text" name="accsuche" value="<?PHP echo $_POST['accsuche']; ?>" size="40" maxlength="16"/></td>
      <td class="topLine"><input type="submit" name="submit" value="suchen"/></td>
    </tr>
  </table>
  </form>
  <table style='width: 100%;'>
    <tr>
      <th class="topLine">ID</th>
      <th class="topLine">Account</th>
      <th class="topLine">Status</th>
      <th class="topLine">E-Mail</th>
      <th class="topLine">Angemeldet seit</th>
      <th class="topLine">Bearbeiten</th>
    </tr>
  <?PHP
  
    if(isset($_POST['submit']) AND $_POST['submit']=="suchen") 
    {
      $sqlCmd = "SELECT id,login,email,create_time,status FROM account.account WHERE (login LIKE '%".mysql_real_escape_string($_POST['accsuche'])."%' OR id='".$_POST['accsuche']."') AND status='BLOCK' ORDER BY login ASC";
    }
    else 
    {
      $sqlCmd = "SELECT id,login,email,create_time,status FROM account.account WHERE status='BLOCK' ORDER BY login ASC";
    }
    
    $sqlQry = mysql_query($sqlCmd,$sqlServ);
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
      <td class=\"$zF\"><a href=\"index.php?s=admin&a=users&acc=".$getAccs->id."\">Ausw�hlen</a></td>\n
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