<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Recupereaza prin Email</h3>
        <div class="big-line"></div> 
<?PHP
  
  if(isset($_POST['emailreset']) && $_POST['emailreset']=="reset") {
    
    if(!empty($_POST['account']) && checkMail($_POST['email']) && $_SESSION["captcha_id"] == $_POST['captcha']) {
      
      $acc = mysql_real_escape_string($_POST['account']);
      $email = mysql_real_escape_string($_POST['email']);
      $newPass = substr(md5(rand(999,99999)),0,8);
      
      $getUser = "SELECT id FROM account.account WHERE login='".$acc."' AND email='".$email."' LIMIT 1";
      $qryUser = mysql_query($getUser);
      
      if(mysql_num_rows($qryUser)>0) {
      
        $setPass = "UPDATE account.account SET password=PASSWORD('".$newPass."') WHERE login='".$acc."' LIMIT 1";
        $qryPass = mysql_query($setPass);
        
        if($qryPass) {
          echo'<p class="meldung">Parola ta a fost schimbată cu succes. Veți primi un e-mail cu noua parolă.</p>';
          
          $absender = $serverSettings['titel']." Passwortservice";
          $email = $serverSettings['pass_mail'];
          $empfaenger = $_POST['email'];
          $mail_body = "Hallo,
          Parola a fost resetată cu succes.
          
          Nume utilizator: ".$acc."
          Parola noua: ".$newPass."
          
          Iti uram multa distractie in continuare,
          
          Echipa ta ".$serverSettings['titel']."
          
          
          Acest e-mail a fost generat automat. Vă rugăm să trimiteți răspunsurile la această adresă.";
          $titel = "Parola pe ".$serverSettings['titel'];
          
          $header .= "X-Priority: 3\n";
          $header .= "X-Mailer: mtVision Homepage Mailer\n";
          $header .= "MIME-Version: 1.0\n";
          $header .= "From: ".$absender." <".$serverSettings['pass_mail'].">\n";
          $header .= "Reply-To: ".$serverSettings['pass_mail']."\n";
          //$header .= "Content-Transfer-Encoding: 8bit\n"; 
          $header .= "Content-Type: text/plain; charset=iso-8859-1\n";
          
          if(!mail($empfaenger, $titel, $mail_body, $header)) {
            echo'<p class="meldung">Eroare cu serverul de e-mail: Va rugam sa contactati un admin cât mai curând posibil!</p>';
          }
          
        }
        else {
          echo'<p class="meldung">O noua parola nu poate fi resetata. În acest raport, vă rugăm să contactați un administrator.</p>';
        }
        
      }
      else {
        echo'<p class="meldung">Combinația nu există.</p>';
      }
      
    }
    else {
      echo'<p class="meldung">Nu ați introdus corect toate datele.</p>';
    }
    
  }

?>

<div>
  <p>Această funcție trimite la adresa de e-mail o nouă parolă. Acest lucru presupune ca e-mail înregistrat sa fie corect.</p>
  <form action="index.php?s=lostpw" method="POST">
    <table>
      <tr>
        <th class="topLine">Nume utilizator:</th>
        <td class="tdunkel"><input type="text" name="account" size="16" maxlength="16"/></td>
      </tr>
      <tr>
        <th class="topLine">E-Mail:</th>
        <td class="tdunkel"><input type="text" name="email" size="25" maxlength="30"/></td>
      </tr>
      <tr>
        <th class="topLine">Captcha:</th>
        <td class="tdunkel"><img style="float: left; margin-left: 10px; margin-top: 10px;" src="./captcha/captcha.php" alt="captcha" title="captcha"/> <input type="text" name="captcha" size="10" maxlength="5"/></td>
      </tr>
      <tr>
        <th colspan="2" class="topLine" style="text-align:center;"><input type="submit" name="emailreset" value="reset"/></th>
      </tr>
    </table>
  </form>
				    </div>
    </div>
    <div class="bottom"></div>
</div>