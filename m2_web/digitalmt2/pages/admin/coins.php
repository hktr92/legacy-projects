
			<div class="postui2 text-title">
					<h2>
                  Coins bearbeiten
                    
                    </h2>
				
				</div>
				<div class="postui2 text-con">
				<div class="con-wrap">
<?PHP
  if($_SESSION['user_admin']>=$adminRights['coins']) {
  
    if(isset($_POST['submit']) && $_POST['submit']=="aktualisieren") {
      if(checkInt($_POST['accID']) && checkInt($_POST['aktCoins']) && checkInt($_POST['coins']) && ($_POST['art']==1 OR $_POST['art']==0)) {
        if($_POST['art']==1) $newCoins=$_POST['aktCoins']+$_POST['coins'];
        else $newCoins=$_POST['aktCoins']-$_POST['coins'];
        if($newCoins<0) $newCoins=0;
       
        $sqlCmd = "UPDATE account.account SET coins='".$newCoins."' WHERE id='".$_POST['accID']."' LIMIT 1";
        $sqlQry = mysql_query($sqlCmd,$sqlServ);
        if($sqlQry) {
          echo'<p class="meldung">Coins erfolgreich verändert. Neuer Wert: <b>'.$newCoins.'</b></p>';
        }
      }
      else {
        echo'<p class="meldung">Eingabe war falsch oder fehlerhaft. Nochmals versuchen.</p>';
      }
    }
    if(isset($_GET['acc']) && !empty($_GET['acc'])) 
    {
      $sqlCmd = "SELECT id,login,coins FROM account.account WHERE id='".$_GET['acc']."' LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlServ);
      if(mysql_num_rows($sqlQry)>0) 
      {
        $accData = mysql_fetch_object($sqlQry);
        echo'<h3>Coins aufladen: "'.$accData->login.'"</h3>';
        ?>
        <p>Aktueller Kontostand: <b><?PHP echo $accData->coins; ?></b></p>
        <div class="user">
          <form action="index.php?s=admin&a=coins&acc=<?PHP echo $accData->id; ?>" method="POST">
            <input type="hidden" name="aktCoins" value="<?PHP echo $accData->coins; ?>"/>
            <input type="hidden" name="accID" value="<?PHP echo $accData->id; ?>"/>
            <table>
              <tr>
                <th class="topLine">Coins ändern:</th>
                <td class="topLine">
                  <input type="text" size="11" maxlength="11" name="coins"/>&nbsp;
                  <select name="art">
                    <option value="1">aufladen</option>
                    <option value="0">abziehen</option>
                  </select>
                </td>
                <td class="topLine"><input type="submit" name="submit" value="aktualisieren"/></td>
              </tr>
            </table>
          </form>
        </div>
        
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
?>
	</div>

  </div> 
				<div class="postui2 text-end">
             
                
                  
    </div>