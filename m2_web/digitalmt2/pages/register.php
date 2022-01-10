<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Înregistrare</h3>
        <div class="big-line"></div>
<?PHP
  
  $regCoins = 0; // Startcoins
  
  $laufZeit = 365; //Tage autoloot,safebox
  $calcLZ = (60*60*24)*365;
  $expireStamp = time()+$calcLZ;
  $expireDate = date("Y-m-d H:i:s",$expireStamp);
  
  if($serverSettings['register_on'] && (!isset($_SESSION['user_admin']) && !checkInt($_SESSION['user_admin']) && !$_SESSION['user_admin']>=0)) {
  
    if(isset($_POST['submit']) && $_POST['submit']=="Senden") {
      if((checkAnum($_POST['account']) && strlen($_POST['account'])>=8 && strlen($_POST['account'])<=16) && checkAnum($_POST['pass'])  && strlen($_POST['pass'])>=8 && strlen($_POST['pass2'])<=16 && !empty($_POST['pass2']) && (checkName($_POST['uname']) && strlen($_POST['uname'])>=3 && strlen($_POST['uname'])<=20) && $_POST['pass']==$_POST['pass2'] && checkMail($_POST['email']) && strlen($_POST['email'])<=40 && $_POST['captcha']==$_SESSION['captcha_id'] && $_POST['email']==$_POST['email2'] && (checkAnum($_POST['sicherheitsa']) && strlen($_POST['sicherheitsa'])>=3 && strlen($_POST['sicherheitsa'])<=16) && checkInt($_POST['sicherheitsf']) && (checkAnum($_POST['loeschcode']) && strlen($_POST['loeschcode'])==7)) {

        $hashSF = md5($_POST['sicherheitsa']);
        $sfNum = mysql_real_escape_string($_POST['sicherheitsf']);
        $lcode = mysql_real_escape_string($_POST['loeschcode']);
        
        $zuFall = rand(99999,999999999);
        $userpass=mysql_real_escape_string($_POST['pass']);
        
        $aktivHash = ($serverSettings['mail_activation']) ? md5($zuFall):'';
        $accountStatus = ($serverSettings['mail_activation']) ? 'BLOCK':'OK';
        
        $sqlCmd = "INSERT INTO account.account 
        (login,password,real_name,email,social_id,question1,answer1,create_time,status,coins,autoloot_expire,safebox_expire,web_aktiviert) 
        VALUES 
        ('".$_POST['account']."',PASSWORD('".$userpass."'),'".mysql_real_escape_string($_POST['uname'])."','".mysql_real_escape_string($_POST['email'])."','".$lcode."','".$sfNum."','".$hashSF."','".$sqlZeit."','".$accountStatus."','".$regCoins."','".$expireDate."','".$expireDate."','".$aktivHash."')";
        $sqlQry = mysql_query($sqlCmd,$sqlServ);
        if($sqlQry) {
          
          
          $absender = $serverSettings['titel']." Înregistrare";
          $email = $serverSettings['reg_mail'];
          $empfaenger = $_POST['email'];
          $mail_body = "Hallo ".$_POST['uname'].",
          
         Înregistrarea ta pe ".$serverSettings['titel']." a fost un succes! În scopul de a putea juca pe server trebuie să activa contul.
          Puteți face acest lucru prin intermediul link-ului următor:
          
          ".$serverSettings['url']."/index.php?s=login&do=aktivieren&hash=".$aktivHash."
          
          Datele tale sunt:
          Account: ".$_POST['account']."
          Parola: ".$userpass."
          
          Cod de stergere: ".$lcode."
          Întrebarea de securitate: ".$sFrage[$sfNum]."
          Raspuns: ".$_POST['sicherheitsa']."
          
          Multa distractie iti doreste,
          
          Echipa ".$serverSettings['titel']."!
          
          
          Acest e-mail a fost generat automat. Vă rugăm să nu trimiteți răspunsurile la această adresă.";
          $titel = "Înregistrare pe ".$serverSettings['titel'];
          
          $header = "X-Priority: 3\n";
          $header .= "X-Mailer: ".$serverSettings['titel']." Homepage Mailer\n";
          $header .= "MIME-Version: 1.0\n";
          $header .= "From: ".$absender." <".$serverSettings['reg_mail'].">\n";
          $header .= "Reply-To: ".$serverSettings['reg_mail']."\n";
          $header .= "Content-Type: text/plain; charset=iso-8859-1\n";
          
          
          if($serverSettings['mail_activation']) {
            mail($empfaenger, $titel, $mail_body, $header);
            echo'<p class="meldung">Contul a fost creat cu succes. Vă rugăm să va uitati în Inbox(email) pentru a confirma înregistrarea.</p>';
          }
          else {
            echo'<p class="meldung">Contul a fost creat cu succes. Puteți să vă logati acum.</p>';
          }
          
        }
        else {
          echo'<p class="meldung">Înregistrare a eșuat: Contul exista deja.</p>';
        }
        
      }
      else {
        echo'<p class="meldung">Înregistrare a eșuat: vă rugăm completati în mod corect toate câmpurile</p>';
      }
    }
  ?>
    <p>Toate campurile sunt obligatorii și trebuie completate. Asigurați-vă că acest lucru este ID-ul de cont și parola de cel puțin 8 caractere sau numere.<br><b><font color="red">ATENTIE: Nu folositi datele de cont de la alte PServern sau detalii de cont pe care le-ați folosit deja!</font></b><?PHP if($serverSettings['mail_activation']) { echo'<br/><b>Der Account wird per E-Mail aktiviert, also eine richtige E-Mail eingeben!</b>'; } ?></p>
    <form action="index.php?s=register" method="POST">
      <table style="width: 100%;">
        <tr>
          <th class="topLine">Account:</th>
          <td class="tdunkel" style="width: 180px;"><input class="txt"  type="text" name="account" maxlength="16" size="16"/></td>
        </tr>
        <tr>
          <th class="topLine">Nume:</th>
          <td class="thell"><input class="txt" type="text" name="uname" maxlength="16" size="16"/></td>
        </tr>
        <tr>
          <th class="topLine">Parola:</th>
          <td class="tdunkel"><input class="txt" type="password" name="pass" maxlength="16" size="16"/></td>
        </tr>
        <tr>
          <th class="topLine">Repeta Parola:</th>
          <td class="thell"><input class="txt" type="password" name="pass2" maxlength="16" size="16"/></td>
        </tr>
        <tr>
          <th class="topLine">E-Mail:</th>
          <td class="tdunkel"><input class="txt" type="text" name="email" maxlength="50" size="25"/></td>
        </tr>
        <tr>
          <th class="topLine">Repeta E-Mail:</th>
          <td class="thell"><input class="txt" type="text" name="email2" maxlength="50" size="25"/></td>
        </tr>
        <tr>
          <th class="topLine">Codul de stergere:</th>
          <td class="tdunkel"><input class="txt" type="text" name="loeschcode" maxlength="7" size="7"/></td>
        </tr>
        <tr>
          <th class="topLine">Întrebarea de securitate:</th>
          <td class="thell">
            <select name="sicherheitsf">
              <?PHP
                foreach($sFrage AS $fragew => $frage) {
                  echo'<option value="'.$fragew.'">'.$frage.'</option>';
                }
              ?>
            </select>
          </td>
          <td>
              <input class="txt" type="text" name="sicherheitsa" maxlength="16" size="16"/>
          </td>
        </tr>
        <tr>
          <th class="topLine">Captcha:</th>
          <td class="tdunkel"><img style="margin-left: 10px;" src="./captcha/captcha.php" title="Captcha"/></td>
          <td>
              <input type="text" class="txt" name="captcha" maxlength="5" size="5"/>
          </td>
        </tr>
        <tr>
            <th colspan="3">Prin înregistrare acceptați <a href="index.php?s=agbs" target="_blank"><font color="#111">AGBs</font></a> (Termeni și condițiile).</th>
        </tr>
        <tr>
          <th class="topLine" style="text-align:center;" colspan="2"><input type="submit" class="button1" name="submit" value="Senden"/> <input class="button1" type="reset" value="Reset"/></th>
        </tr>
      </table>
    </form>
  <?PHP
  }
  else {
    echo'<p class="meldung">Înregistrarea este dezactivata sau ești deja logat. Contul nu a fost creeat.</p>';
  }
?>
    </div>
    <div class="bottom"></div>
</div>
