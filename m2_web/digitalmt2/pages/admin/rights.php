
			<div class="postui2 text-title">
					<h2>
                   Account Rechte
                    
                    </h2>
				
				</div>
				<div class="postui2 text-con">
				<div class="con-wrap"><?PHP
  if($_SESSION['user_admin']>=$adminRights['web_admins']) {
    if(isset($_POST['submit']) && $_POST['submit']=="aktualisieren" && !empty($_POST['id']) && $_POST['rechte']>=0) {
      $sqlCmd = "UPDATE account.account SET web_admin='".$_POST['rechte']."' WHERE id='".$_POST['id']."' LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlServ);
      if($sqlQry) {
        echo"<p class=\"meldung\">Rechte erfolgreich aktualisiert.</a>";
      }
    }
    if(isset($_GET['acc']) && !empty($_GET['acc'])) 
    {
      $sqlCmd = "SELECT id,login,web_admin FROM account.account WHERE id='".$_GET['acc']."' LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlServ);
      if(mysql_num_rows($sqlQry)>0) 
      {
        $accData = mysql_fetch_object($sqlQry);
        echo'<h3>Web-Rechte für "'.$accData->login.'"</h3>';
        ?>
          <form action="index.php?s=admin&a=rights&acc=<?PHP echo $_GET['acc']; ?>" method="POST">
          <input type="hidden" name="id" value="<?PHP echo $_GET['acc']; ?>"/>
            <table>
              <tr>
                <th class="topLine">Rechte Einstellen</th>
                <td class="topLine">
                  <select name="rechte">
                    <?PHP
                      for($i=0;$i<10;$i++) {
                        if($i==$accData->web_admin) { $selected = "selected "; }
                        else { $selected=""; }
                        if($i==0) { echo '<option '.$selected.'value="0">keine</option>'; }
                        else { echo '<option '.$selected.'value="'.$i.'">Stufe '.$i.'</option>'; }
                      }
                    ?>
                  </select>
                </td>
                <td class="topLine"><input type="submit" name="submit" value="aktualisieren" /></td>
              </tr>
            </table>
          </form>
        <?PHP
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
?>			</div>

  </div> 
				<div class="postui2 text-end">
             
                
                  
    </div>