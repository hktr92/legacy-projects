<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <?PHP
  if($_SESSION['user_admin']>=$adminRights['acc_ansicht']) {
  

    
    if(isset($_GET['acc']) && !empty($_GET['acc'])) 
    {
      $sqlCmd = "SELECT login,status FROM account.account WHERE id='".$_GET['acc']."' LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlServ);
      if(mysql_num_rows($sqlQry)>0) 
      {
        $accData = mysql_fetch_object($sqlQry);
        
        echo'<h3>"'.$accData->login.'" bearbeiten</h3>';
        echo'<div class="big-line"></div>';
        echo'<ul class="menue">';
        
        echo'<li><a href="index.php?s=admin&a=chars&acc='.$_GET['acc'].'">Charaktere Anzeigen</a></li>';
        echo'<li><a href="index.php?s=admin&a=rights&acc='.$_GET['acc'].'">Web-Userrechte f&uuml;r diesen Account verwalten</a></li>';
        echo'<li><a href="index.php?s=admin&a=psc_add&acc='.$_GET['acc'].'">PSC f&uuml;r diesen Account hinzuf&uuml;gen</a></li>';
        echo'<li><a href="index.php?s=admin&a=coins&acc='.$_GET['acc'].'">Coins-Guthaben ver&auml;ndern</a></li>';
        echo'<li><a href="index.php?s=admin&a=create_item&acc='.$_GET['acc'].'">Item f&uuml;r diesen Account generieren</a></li>';
        if($accData->status=='OK') 
        {
          echo'<li><a href="index.php?s=admin&a=ban&acc='.$_GET['acc'].'">Account bannen</a></li>';
        }
        elseif($accData->status=='BLOCK') 
        {
          echo'<li><a href="index.php?s=admin&a=unban&acc='.$_GET['acc'].'">Account entbannen</a></li>';
        }
        echo'</ul>';
    ?>    </div>
    <div class="bottom"></div>
</div>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Banlog</h3>
        <div class="big-line"></div>
    <?php
        $sqlBanlog = "SELECT * FROM ".SQL_HP_DB.".ban_log WHERE account_id='".$_GET['acc']."'";
        $qryBanlog = mysql_query($sqlBanlog,$sqlHp);
        
        echo '
        <table style="width: 100%;">
        <tr>
          <th class="topLine">Aktion</th>
          <th class="topLine">Zeitpunkt</th>
          <th class="topLine">Admin</th>
        </tr>';
        while($getBanlog = mysql_fetch_object($qryBanlog)) {
          echo'<tr>
            <td class="tdunkel">'.$getBanlog->typ.'</td>
            <td class="tdunkel">'.$getBanlog->zeitpunkt.'</td>
            <td class="tdunkel"><a href="index.php?s=admin&a=users&acc='.$getBanlog->admin_id.'">'.$getBanlog->admin_id.'</a></td>
          </tr>
          <tr>
            <td class="thell" colspan="3">'.$getBanlog->grund.'</td>
          </tr>';
        }
        echo'</table>';
      }
      else
      {
        echo'<p>Die eingegebene Account-ID existiert nicht!</p>';      
      }
    }
    else 
    {
      echo'<p class="meldung">Es wurde keine Account-ID eingegeben.</p>';
    }
    
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>    </div>
    <div class="bottom"></div>
</div>