
			<div class="postui2 text-title">
					<h2>
   Accounts Bannen
                    
                    </h2>
				
				</div>
				<div class="postui2 text-con">
				<div class="con-wrap">
<?PHP
  if($_SESSION['user_admin']>=$adminRights['ban_account']) {
  

    
    if(isset($_GET['acc']) && !empty($_GET['acc'])) 
    {
      
      if(isset($_POST['submit']) && $_POST['submit']=='sperren') {
        
          if(!empty($_POST['banGrund']) && !empty($_POST['banEingabe'])) {
          
            $sqlCmd = "SELECT login FROM account.account WHERE id='".$_GET['acc']."' LIMIT 1";
            $sqlQry = mysql_query($sqlCmd,$sqlServ);
            
            if(mysql_num_rows($sqlQry)>0) 
            {
              $accData = mysql_fetch_object($sqlQry);
              $sqlCmd = "UPDATE account.account SET status='BLOCK' WHERE id='".$_GET['acc']."' LIMIT 1";
              if(mysql_query($sqlCmd,$sqlServ)) {
                echo'<p>'.$accData->login.' wurde gesperrt</p>';
                echo'<p><a href="index.php?s=admin&a=users&acc='.$_GET['acc'].'">zur&uuml;ck zur &Uuml;bersicht</a></p>';
              }
              
              $begruendung = $_POST['banGrund'].': '.$_POST['banEingabe'];
              
              $sqlLog = "INSERT INTO ".SQL_HP_DB.".ban_log (admin_id,account_id,zeitpunkt,grund,typ) VALUES ('".$_SESSION['user_id']."','".$_GET['acc']."',NOW(),'".$begruendung."','BLOCK')";
              $qryLog = mysql_query($sqlLog,$sqlHp);
            }
            else
            {
              echo'<p>Die eingegebene Account-ID existiert nicht!</p>';      
            }
            
          }
          else {
            echo'<p class="meldung">Es wurde keine ausf&uuml;hrliche Begr&uuml;ndung eingegeben.</p>';
          }

      }
      
      $sqlLogin = "SELECT login FROM account.account WHERE id='".$_GET['acc']."' LIMIT 1";
      $qryLogin = mysql_query($sqlLogin,$sqlServ);
      $getLogin = mysql_fetch_object($qryLogin);
      
      ?>
      <form action="index.php?s=admin&a=ban&acc=<?PHP echo $_GET['acc']; ?>" method="POST">
        <table>
          <tr>
            <th class="topLine">Account:</th>
            <td class="tdunkel"><?PHP echo $getLogin->login ?></td>
          </tr>
          <tr>
            <th class="topLine">Begr&uuml;ndung:</th>
            <td class="thell">
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
            <th class="topLine" style="text-align:center;" colspan="2"><input type="submit" name="submit" value="sperren"/></th>
          </tr>
        </table>
      </form>
      <?PHP
    }
    else 
    {
      echo'<p class="meldung">Es wurde keine Account-ID eingegeben.</p>';
    }
    
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>
	</div>

  </div> 
				<div class="postui2 text-end">
             
                
                  
    </div>