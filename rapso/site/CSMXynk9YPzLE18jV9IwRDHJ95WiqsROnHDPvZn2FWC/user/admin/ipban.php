<?PHP
  if($_SESSION['user_admin']>=$adminRights['ban_account']) {
?>
<h2>Administrare - blocarea conturilor pe IP</h2>
<?PHP
    if(isset($_GET['ip']) && !empty($_GET['ip'])) {
      
      if(isset($_POST['submit']) && $_POST['submit']=="Baneaza") {
      
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
          echo'<p class="meldung">Conturile au fost blocate cu succes.</p>';
        }
        else {
          echo'<p class="meldung">Nu a&#355;i introdus nici un motiv detaliat.</p>';
        }
      }
      
      
      $sqlCmd = "SELECT account.id,account.login,player.name 
        FROM player.player 
        INNER JOIN account.account 
        ON account.id = player.account_id 
        WHERE player.ip='".$_GET['ip']."'";
      $sqlQry=mysql_query($sqlCmd,$sqlServ);
      if(mysql_num_rows($sqlQry)>0) {
        echo'<p>Urm&#259;toarele conturi au fost gasite : </p>';
        ?>
        <form method="POST" action="index.php?s=admin&a=ipban&ip=<?PHP echo $_GET['ip']; ?>">
          <table>
            <tr>
              <th class="topLine">ID-ul contului</th>
              <th class="topLine">Cont</th>
              <th class="topLine">Caracter</th>
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
              <th class="topLine">Motiv:</th>
              <td class="thell" colspan="2">
                <select name="banGrund">
                  <?PHP
                  
                    foreach($banGruende AS $gruende) {
                      echo'<option value="'.$gruende.'">'.$gruende.'</option>';
                    }
                    
                  ?>
                </select>
                &nbsp;Motiv&nbsp;
                <input type="text" name="banEingabe" size="50" maxlength="150" />
              </td>
            </tr>
            <tr>
              <th class="topLine" style="text-align:center;" colspan="3"><input type="submit" name="submit" value="Baneaza"/></th>
            </tr>
          </table>
        </form>
        <?PHP
      }
      else {
        echo'<p class="meldung">Pe IP-ul acesta nu s-au g&#259;sit conturi.</p>';
      }
    }
    else {
      echo'<p class="meldung">Nu a&#355;i introdus nici un IP.</p>';
    }
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>