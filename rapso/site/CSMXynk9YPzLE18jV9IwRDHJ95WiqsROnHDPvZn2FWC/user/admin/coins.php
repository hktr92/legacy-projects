<?PHP
  if($_SESSION['user_admin']>=$adminRights['coins']) {
  
    echo '<h2>Administrare - editare monede</h2>';
    if(isset($_POST['submit']) && $_POST['submit']=="Schimba") {
      if(checkInt($_POST['accID']) && checkInt($_POST['aktCoins']) && checkInt($_POST['coins']) && ($_POST['art']==1 OR $_POST['art']==0)) {
        if($_POST['art']==1) $newCoins=$_POST['aktCoins']+$_POST['coins'];
        else $newCoins=$_POST['aktCoins']-$_POST['coins'];
        if($newCoins<0) $newCoins=0;
       
        $sqlCmd = "UPDATE account.account SET coins='".$newCoins."' WHERE id='".$_POST['accID']."' LIMIT 1";
        $sqlQry = mysql_query($sqlCmd,$sqlServ);
        if($sqlQry) {
          echo'<p class="meldung">Monedele au fost schimbate cu succes. Noua valoare : <b>'.$newCoins.'</b></p>';
        }
      }
      else {
        echo'<p class="meldung">A fost incorect sau eronat. &#206;ncerca&#355;i din nou.</p>';
      }
    }
    if(isset($_GET['acc']) && !empty($_GET['acc'])) 
    {
      $sqlCmd = "SELECT id,login,coins FROM account.account WHERE id='".$_GET['acc']."' LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlServ);
      if(mysql_num_rows($sqlQry)>0) 
      {
        $accData = mysql_fetch_object($sqlQry);
        echo'<h3><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Utilizator : "'.$accData->login.'"</h3>';
        ?>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Soldul contului curent : <b><?PHP echo $accData->coins; ?></b></p>
        <div class="user">
          <form action="index.php?s=admin&a=coins&acc=<?PHP echo $accData->id; ?>" method="POST">
            <input type="hidden" name="aktCoins" value="<?PHP echo $accData->coins; ?>"/>
            <input type="hidden" name="accID" value="<?PHP echo $accData->id; ?>"/>
            <table>
              <tr>
                <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Schimb&#259; monedele:</th>
                <td class="topLine">
                  <input type="text" size="11" maxlength="11" name="coins"/>&nbsp;
                  <select name="art">
                    <option value="1">adaug&#259;</option>
                    <option value="0">&#351;terge</option>
                  </select>
                </td>
                <td class="topLine"><input type="submit" name="submit" value="Schimba"/></td>
              </tr>
            </table>
          </form>
        </div>
        
        <?PHP
      }
      else
      {
        echo'<p>ID-ul contului care l-a&#355;i introdus nu exist&#259;!</p>';      
      }
    }
    else 
    {
      echo'<p class="meldung">Nu a&#355;i introdus nici un ID!</p>';
    }
    
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?><br/>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>