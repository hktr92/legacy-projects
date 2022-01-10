<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Resetare parolă</h3>
        <div class="big-line"></div> 
<?
if(!empty($_SESSION['need_pwchange'])) {
  echo '<b style="color: red;">Datorita unei vulnerabilitati in sistem sunteti rugat sa va schimbati parola contului. Atentie! Nu folositi date pe care le-ati mai folosit in trecut!</b>';
 } else {
?>
<?PHP

  if(isset($_SESSION['user_admin']) && checkInt($_SESSION['user_admin']) && $_SESSION['user_admin']>=0) {    
    if(isset($_POST['submit']) && $_POST['submit']=="Schimba") {
    
      if(checkAnum($_POST['npass']) && !empty($_POST['opass']) && (!empty($_POST['npass']) && strlen($_POST['npass'])>=8 && strlen($_POST['npass'])<=16) && $_POST['npass']==$_POST['npass2']) {
        
        $oldPass = mysql_real_escape_string($_POST['opass']);
        $newPass = mysql_real_escape_string($_POST['npass']);
        
        $sqlCmd = "SELECT id,login FROM account.account WHERE password=PASSWORD('".$oldPass."') AND id='".$_SESSION['user_id']."' LIMIT 1";
        $sqlQry = mysql_query($sqlCmd,$sqlServ);
        
        if(mysql_num_rows($sqlQry)==1) {
        
          $passCmd = "UPDATE account.account SET password=PASSWORD('".$newPass."') WHERE id='".$_SESSION['user_id']."' LIMIT 1;";
          $passUpdate = mysql_query($passCmd,$sqlServ);
          
          if($passUpdate) {
            echo'<p class="meldung">Parola a fost schimbată cu succes.</p>';
          }
          else {
            echo'<p class="meldung">Schimbarea nu a reușit.</p>';
          }
          
        }
        else {
          echo'<p class="meldung">Parola introdusă nu este incorectă</p>';
        }
        
      }
      else {
        echo'<p class="meldung">Nu ați introdus corect toate datele.</p>';
      }
      
    }
    
    if(isset($_POST['frage']) && $_POST['frage']=="aktualisieren") {

      if(!empty($_POST['opass']) && checkInt($_POST['sicherheitsf']) && checkAnum($_POST['sicherheitsa']) && strlen($_POST['sicherheitsa'])>=3 && strlen($_POST['sicherheitsa'])<=16) {
        
        $oldPass = mysql_real_escape_string($_POST['opass']);
        $frage = mysql_real_escape_string($_POST['sicherheitsf']);
        $antwort = mysql_real_escape_string(md5($_POST['sicherheitsa']));
        
        $sqlCmd = "SELECT id,login FROM account.account WHERE password=PASSWORD('".$oldPass."') AND id='".$_SESSION['user_id']."' LIMIT 1";
        $sqlQry = mysql_query($sqlCmd,$sqlServ);
        
        if(mysql_num_rows($sqlQry)==1) {
        
          $sfCmd = "UPDATE account.account SET question1='".$frage."',answer1='".$antwort."' WHERE id='".$_SESSION['user_id']."' LIMIT 1;";
          $sfUpdate = mysql_query($sfCmd,$sqlServ);
          
          if($sfUpdate) {
            echo'<p class="meldung">Întrebarea de securitate a fost schimbat cu succes.</p>';
          }
          else {
            echo'<p class="meldung">Schimbarea nu a reușit.</p>';
          }
          
        }
        else {
          echo'<p class="meldung">Parola introdusă este incorectă</p>';
        }
        
      }
      else {
        echo'<p class="meldung">Nu ați introdus corect toate datele.</p>';
      }
    }
    
    if(isset($_POST['submit']) && $_POST['submit']=="Lagerpasswort") {
      if(checkAnum($_POST['lnpass']) && strlen($_POST['lnpass'])>=1 && strlen($_POST['lnpass'])<=6 && $_POST['lnpass']==$_POST['lnpass2']) {
        $oldPass = mysql_real_escape_string($_POST['lopass']);
        $newPass = mysql_real_escape_string($_POST['lnpass']);
        $sqlCmd = "SELECT password FROM player.safebox WHERE password='".$oldPass."' AND account_id='".$_SESSION['user_id']."' LIMIT 1";
        $sqlQry = mysql_query($sqlCmd,$sqlServ);
        if(mysql_num_rows($sqlQry)==1) {
          $passCmd = "UPDATE player.safebox SET password='".$newPass."' WHERE account_id='".$_SESSION['user_id']."' LIMIT 1;";
          $passUpdate = mysql_query($passCmd,$sqlServ);
          if($passUpdate) {
            echo'<p class="meldung">Parola depozitului a fost schimbată cu succes</p>';
          }
          else {
            echo'<p class="meldung">Schimbarea nu a reușit.</p>';
          }
        }
        else {
          echo'<p class="meldung">Parola depozitului nu este corecta</p>';
        }
        
      }
      else {
        echo'<p class="meldung">Nu ați introdus corect toate datele.</p>';
      }
    }
  
  ?>
      <div class="splitLeft">
        <form action="index.php?s=passwort" method="POST">
          <p>Noua parolă trebuie să aibă următoarele proprietăți:<br/><b>8-16 Caractere (doar a-Z,0-9)</b>.</p>
          <table>
            <tr>
              <th class="topLine" colspan="2">Parola-Account</th>
            </tr>
            <tr>
              <th class="topLine">Parola Veche:</th>
              <td class="tdunkel"><input class="txt" type="password" name="opass" size="16" maxlength="16"/></td>
            </tr>
            <tr>
              <th class="topLine">Parola Nouă:</th>
              <td class="tdunkel"><input class="txt" type="password" name="npass" size="16" maxlength="16"/></td>
            </tr>
            <tr>
              <th class="topLine">Parola Nouă (repetă):</th>
              <td class="tdunkel"><input class="txt" type="password" name="npass2" size="16" maxlength="16"/></td>
            </tr>
            <tr>
              <th class="topLine" style="text-align:center;" colspan="2"><input type="submit" name="submit" value="Ändern"/></th>
            </tr>
          </table>
        </form><br /><br />
        <form action="index.php?s=passwort" method="POST">
          <table>
            <tr>
              <th class="topLine" colspan="2">Întrebarea de securitate</th>
            </tr>
            <tr>
              <th class="topLine">Parola:</th>
              <td class="tdunkel"><input class="txt" type="password" name="opass" size="16" maxlength="16"/></td>
            </tr>
            <tr>
              <th class="topLine">Întrebarea de securitate:</th>
              <td class="tdunkel">
                <select name="sicherheitsf">
                  <?PHP
                    foreach($sFrage AS $fragew => $frage) {
                      echo'<option value="'.$fragew.'">'.$frage.'</option>';
                    }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <th class="topLine">Raspuns:</th>
              <td class="tdunkel"><input class="txt" type="text" name="sicherheitsa" size="16" maxlength="16"/></td>
            </tr>
            <tr>
              <th class="topLine" style="text-align:center;" colspan="2"><input type="submit" name="frage" value="aktualisieren"/></th>
            </tr>
          </table>
        </form>
      </div><br /><br />
      <div class="splitRight">
        <form action="index.php?s=passwort" method="POST">
          <p>Parola depozitului trebuie schimbată cel puțin o dată în prealabil.
         Noua parolă trebuie să aibă următoarele proprietăți:<br/><b>1-6 Caractere (doar a-Z,0-9)</b>.</p>
          <table>
            <tr>
              <th class="topLine" colspan="2">Parola-Depozit</th>
            </tr>
            <tr>
              <th class="topLine">Parola veche:</th>
              <td class="tdunkel"><input class="txt" type="password" name="lopass" size="6" maxlength="6"/></td>
            </tr>
            <tr>
              <th class="topLine">Parola nouă:</th>
              <td class="tdunkel"><input class="txt" type="password" name="lnpass" size="6" maxlength="6"/></td>
            </tr>
            <tr>
              <th class="topLine">Parola nouă (repetă):</th>
              <td class="tdunkel"><input class="txt" type="password" name="lnpass2" size="6" maxlength="6"/></td>
            </tr>
            <tr>
              <th class="topLine" style="text-align:center;" colspan="2"><input type="submit" name="submit" value="Parola depozitului"/></th>
            </tr>
          </table>
        </form>
      </div>
    </form>
  <?PHP
  }
  else {
    echo'<p class="meldung">Trebuie să fii logat pentru acest domeniu.</p>';
  }
?>
<? } ?>
    </div>
    <div class="bottom"></div>
</div>