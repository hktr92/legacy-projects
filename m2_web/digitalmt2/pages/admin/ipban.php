<?PHP
  if($_SESSION['user_admin']>=$adminRights['ban_account']) {
?>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>IP Ban</h3>
        <div class="big-line"></div>
<?PHP
    if(isset($_GET['ip']) && !empty($_GET['ip'])) {
      
      if(isset($_POST['submit']) && $_POST['submit']=="sperren") {
      
        if(!empty($_POST['banGrund']) && !empty($_POST['banEingabe'])) {
          $begruendung = $_POST['banGrund'].': '.$_POST['banEingabe'];
          $sqlCmd = "SELECT DISTINCT account.id 
            FROM player.player 
            INNER JOIN account.account 
            ON account.id = player.account_id 
            WHERE player.ip='".$_GET['ip']."'";
          $sqlQry=mysql_query($sqlCmd,$sqlServ);
          $idArray=array();
          while($getIDs=mysql_fetch_object($sqlQry)) {
            $idArray[]=$getIDs->id;
          }
          foreach($idArray AS $banID) {
            $sqlCmd2="UPDATE account.account SET status='BLOCK' WHERE id='".$banID."' LIMIT 1";
            $sqlQry2=mysql_query($sqlCmd2,$sqlServ);
                
            $sqlLog = "INSERT INTO ".SQL_HP_DB.".ban_log (admin_id,account_id,zeitpunkt,grund,typ) VALUES ('".$_SESSION['user_id']."','".$banID."',NOW(),'".$begruendung."','BLOCK')";
            $qryLog = mysql_query($sqlLog,$sqlHp);
          }
          echo'<p class="meldung">Accounts erfolgreich gebannt.</p>';
        }
        else {
          echo'<p class="meldung">Es wurde keine ausf&uuml;hrliche Begr&uuml;ndung eingegeben.</p>';
        }
      }
      
      
      $sqlCmd = "SELECT account.id,account.login,player.name 
        FROM player.player 
        INNER JOIN account.account 
        ON account.id = player.account_id 
        WHERE player.ip='".$_GET['ip']."'";
      $sqlQry=mysql_query($sqlCmd,$sqlServ);
      if(mysql_num_rows($sqlQry)>0) {
        echo'<p>Die folgenden Verbindungen wurden gefunden</p>';
        ?>
        <form method="POST" action="index.php?s=admin&a=ipban&ip=<?PHP echo $_GET['ip']; ?>">
          <table>
            <tr>
              <th class="topLine">AccountID</th>
              <th class="topLine">Account</th>
              <th class="topLine">Charakter</th>
            </tr>
            <?PHP
              $x=0;
              while($getAccs=mysql_fetch_object($sqlQry)) {
                $zF = ($x%2) ? "tdunkel" : "thell";
                echo'<tr>
                  <td class="'.$zF.'">'.$getAccs->id.'</td>
                  <td class="'.$zF.'">'.$getAccs->login.'</td>
                  <td class="'.$zF.'">'.$getAccs->name.'</td>
                </tr>';
                $x++;
              }
            ?>
            <tr>
              <th class="topLine">Begr&uuml;ndung:</th>
              <td class="thell" colspan="2">
                <select name="banGrund">
                  <?PHP
                  
                    foreach($banGruende AS $gruende) {
                      echo'<option value="'.$gruende.'">'.$gruende.'</option>';
                    }
                    
                  ?>
                </select>
                &nbsp;Erg&auml;nzung&nbsp;
                <input type="text" name="banEingabe" size="50" maxlength="150" />
              </td>
            </tr>
            <tr>
              <th class="topLine" style="text-align:center;" colspan="3"><input type="submit" name="submit" value="sperren"/></th>
            </tr>
          </table>
        </form>
        <?PHP
      }
      else {
        echo'<p class="meldung">Zu der IP wurden keine Accounts gefunden</p>';
      }
    }
    else {
      echo'<p class="meldung">Es wurde keine IP eingegeben</p>';
    }
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>    </div>
    <div class="bottom"></div>
</div>