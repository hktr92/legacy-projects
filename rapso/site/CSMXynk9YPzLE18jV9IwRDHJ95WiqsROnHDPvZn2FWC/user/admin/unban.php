<?PHP
  if($_SESSION['user_admin']>=$adminRights['unban_account']) {
  
    echo '<h2>Administrare - deblocare cont</h2>';
    
    if(isset($_GET['acc']) && !empty($_GET['acc'])) 
    {
      
      if(isset($_POST['submit']) && $_POST['submit']=='Deblocare') {
        
          if(!empty($_POST['banEingabe'])) {
          
            $sqlCmd = "SELECT login FROM account.account WHERE id='".$_GET['acc']."' LIMIT 1";
            $sqlQry = mysql_query($sqlCmd,$sqlServ);
            
            if(mysql_num_rows($sqlQry)>0) 
            {
              $accData = mysql_fetch_object($sqlQry);
              $sqlCmd = "UPDATE account.account SET status='OK' WHERE id='".$_GET['acc']."' LIMIT 1";
              if(mysql_query($sqlCmd,$sqlServ)) {
                echo'<p><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contul '.$accData->login.' a fost deblocat.</p>';
                echo'<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=users&acc='.$_GET['acc'].'">&#206;napoi la list&#259;</a></p>';
              }
              
              $begruendung = $_POST['banEingabe'];
              
              $sqlLog = "INSERT INTO ".SQL_HP_DB.".ban_log (admin_id,account_id,zeitpunkt,grund,typ) VALUES ('".$_SESSION['user_id']."','".$_GET['acc']."',NOW(),'".$begruendung."','OK')";
              $qryLog = mysql_query($sqlLog,$sqlHp);
            }
            else
            {
              echo'<p><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID-ul contului introdus nu exist&#259;.</p>';      
            }
            
          }
          else {
            echo'<p class="meldung"><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nu a&#355;i introdus nici un motiv detaliat.</p>';
          }

      }
      
      $sqlLogin = "SELECT login FROM account.account WHERE id='".$_GET['acc']."' LIMIT 1";
      $qryLogin = mysql_query($sqlLogin,$sqlServ);
      $getLogin = mysql_fetch_object($qryLogin);
      
      ?>
      <form action="index.php?s=admin&a=unban&acc=<?PHP echo $_GET['acc']; ?>" method="POST">
        <br/><table>
          <tr>
            <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;Cont : </th>
            <td class="tdunkel"><?PHP echo $getLogin->login ?><br/></td>
          </tr>
          <tr>
            <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Motiv : &nbsp;</th>
            <td class="thell">
              <input type="text" name="banEingabe" size="50" maxlength="150" />
            </td>
          </tr>
          <tr>
            <th class="topLine" style="text-align:center;" colspan="2"><br/><input type="submit" name="submit" value="Deblocare"/></th>
          </tr>
        </table><br/>
      </form>
      <?PHP
    }
    else 
    {
      echo'<p class="meldung"><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nu a&#355;i introdus nici un ID!</p>';
    }
    
  }
  else {
    echo'<p class="meldung"><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>