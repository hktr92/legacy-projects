<?PHP
  if($_SESSION['user_admin']>=$adminRights['banlist']) {
?>
<h2>Administrare - lista conturilor blocate</h2>
  <form action="index.php?s=admin&a=banlist" method="POST">
  <table><br/>
    <tr>
      <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&#259;utare (Cont / ID-ul Contului):</th>
      <td class="topLine"><input type="text" name="accsuche" value="<?PHP echo $_POST['accsuche']; ?>" size="20" maxlength="16"/></td>
      <td class="topLine"><input type="submit" name="submit" value="Cauta"/></td>
    </tr>
  </table>
  </form>
  <table>
    <tr><br/>
      <th class="topLine">&nbsp;&nbsp;&nbsp;ID</th>
      <th class="topLine">Cont</th>
      <th class="topLine">Stare</th>
      <th class="topLine">E-Mail</th>
      <th class="topLine">Inregistrat</th>
      <th class="topLine">Editare</th>
    </tr>
  <?PHP
  
    if(isset($_POST['submit']) AND $_POST['submit']=="Cauta") 
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
      <td class=\"$zF\">&nbsp;&nbsp;&nbsp;".$getAccs->id."</td>\n
      <td class=\"$zF\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"index.php?s=admin&a=users&acc=".$getAccs->id."\">".$getAccs->login."</a></td>\n
      <td class=\"$zF\" style=\"color:$accZustand;\">&nbsp;&nbsp;&nbsp;".$getAccs->status."&nbsp;&nbsp;&nbsp;</td>\n
      <td class=\"$zF\">".$getAccs->email."&nbsp;&nbsp;&nbsp;</td>\n
      <td class=\"$zF\">".$getAccs->create_time."&nbsp;&nbsp;&nbsp;</td>\n
      <td class=\"$zF\"><a href=\"index.php?s=admin&a=users&acc=".$getAccs->id."\">Selecteaz&#259;</a></td>\n
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