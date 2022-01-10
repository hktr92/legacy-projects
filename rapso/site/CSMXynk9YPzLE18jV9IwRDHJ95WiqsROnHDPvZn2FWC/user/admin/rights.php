<?PHP
  if($_SESSION['user_admin']>=$adminRights['web_admins']) {
  
    echo '<h2>Administrare - drepturile utilizatorilor</h2>';
    if(isset($_POST['submit']) && $_POST['submit']=="Adauga" && !empty($_POST['id']) && $_POST['rechte']>=0) {
      $sqlCmd = "UPDATE account.account SET web_admin='".$_POST['rechte']."' WHERE id='".$_POST['id']."' LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlServ);
      if($sqlQry) {
        echo"<p class=\"meldung\"><br/>&nbsp;&nbsp;&nbsp;&nbsp;Drepturile au fost ad&#259;ugate cu succes.</a>";
      }
    }
    if(isset($_GET['acc']) && !empty($_GET['acc'])) 
    {
      $sqlCmd = "SELECT id,login,web_admin FROM account.account WHERE id='".$_GET['acc']."' LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlServ);
      if(mysql_num_rows($sqlQry)>0) 
      {
        $accData = mysql_fetch_object($sqlQry);
        echo'<br><h3>&nbsp;&nbsp;&nbsp;&nbsp;Drepturi pentru "'.$accData->login.'"</h3><br>';
        ?>
          <form action="index.php?s=admin&a=rights&acc=<?PHP echo $_GET['acc']; ?>" method="POST">
          <input type="hidden" name="id" value="<?PHP echo $_GET['acc']; ?>"/>
            <table>
              <tr>
                <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;Dreptul utilizatorului &nbsp;&nbsp;&nbsp;&nbsp;</th>
                <td class="topLine">
                  <select name="rechte">
                    <?PHP
                      for($i=0;$i<10;$i++) {
                        if($i==$accData->web_admin) { $selected = "selected "; }
                        else { $selected=""; }
                        if($i==0) { echo '<option '.$selected.'value="0">Normal</option>'; }
                        else { echo '<option '.$selected.'value="'.$i.'">Nivel '.$i.'</option>'; }
                      }
                    ?>
                  </select>
                </td>
               <td class="topLine"><input type="submit" name="submit" value="Adauga" /></td>
              </tr>
            </table>
          </form>
        <?PHP
      }
      else
      {
        echo'<p><br/>&nbsp;&nbsp;&nbsp;&nbsp;ID-ul contului introdus nu exist&#259;!</p>';      
      }
    }
    else 
    {
      echo'<p class="meldung"><br/>&nbsp;&nbsp;&nbsp;&nbsp;ID-ul contului introdus nu exist&#259;!Introduceti ID-ul!</p>';
    }
    
  }
  else {
    echo'<p class="meldung"><br/>&nbsp;&nbsp;&nbsp;&nbsp;ID-ul contului introdus nu exist&#259;!Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?><br/>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>