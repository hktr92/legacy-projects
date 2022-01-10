<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>User Panel</h3>
        <div class="big-line"></div>
<?PHP
  if(isset($_GET['do']) && $_GET['do']=="aktivieren" && isset($_GET['hash']) && !empty($_GET['hash'])) {
    if(strlen($_GET['hash'])==32 && $_GET['hash']!=1 && checkAnum($_GET['hash'])) {
      $cmdHash = "SELECT id,web_aktiviert FROM account.account WHERE web_aktiviert='".$_GET['hash']."' AND web_aktiviert!='1' LIMIT 1;";
      $qryHash = mysql_query($cmdHash,$sqlServ);
      
      if(mysql_num_rows($qryHash)) {
      
        $getData = mysql_fetch_object($qryHash);
        $userUpdate = "UPDATE account.account SET web_aktiviert='1',status='OK' WHERE id='".$getData->id."' LIMIT 1;";
        $updateQry = mysql_query($userUpdate,$sqlServ);
        
        if($updateQry) {
          echo'<p class="meldung">Contul tău a fost activat cu succes. Vă puteți conecta acum.</p>';
          echo'<meta http-equiv="refresh" content="1; URL=index.php?s=login"> ';
        }
        else {
          echo'<p class="meldung">Înregistrarea ta a eșuat. Vă rugăm să contactați un admin!</p>';
        }
        
      }
      else {
        echo'<p class="meldung">Nu a fost nici o intrare găsită. Activarea nu a reușit.</p>';
      }
      
    }
    else {
      echo'<p class="meldung">Datele introduse sunt invalide!</p>';
    }
  }

  if(!empty($_SESSION['user_id'])) 
  {
	if(!empty($_SESSION['need_pwchange'])) {
		echo '<b style="color: red;">Datorita unei vulnerabilitati in sistem sunteti rugat sa va schimbati parola contului. Atentie! Nu folositi date pe care le-ati mai folosit in trecut!<br><a href="index.php?s=sysbugpwchange">Schimbare parolă.</a></b>';
	} else {
		echo'<div class="splitLeft">';
		echo'<ul class="menue">';
		echo'</div>';
		echo'<div class="splitRight">';
		
		$cmdStats = "SELECT SUM( player.playtime ) AS ges_spielzeit, COUNT( * ) AS ges_chars, player_index.empire
		FROM player.player
		INNER JOIN player.player_index ON player_index.id = player.account_id
		WHERE player.account_id = '".$_SESSION['user_id']."'
		LIMIT 1";
		
		$qryStats = mysql_query($cmdStats,$sqlServ);
		$getStats = mysql_fetch_object($qryStats);
		
		if(!empty($getStats->empire)) {
		  $reich = '<img src="img/reiche/'.$getStats->empire.'.png" title="Regat" alt="Regat"/>';
		}
		else {
		  $reich='nici un regat selectat';
		}
		
		
		echo'
		<table style="width: 100%">
		  <tr>
			<th style="width: 50%;" class="topLine">Nume utilizator :</th>
			<td style="width: 50%;" class="tdunkel">'.$_SESSION['user_name'].'</td>
		  </tr>
		  <tr>
			<th class="topLine">Regat:</th>
			<td class="thell">'.$reich.'</td>
		  </tr>
		  <tr>
			<th class="topLine">Nr. Caractere:</th>
			<td class="tdunkel">'.$getStats->ges_chars.'</td>
		  </tr>
		  <tr>
			<th class="topLine">Timp jucat:</th>
			<td class="thell">'.$getStats->ges_spielzeit.' Minute</td>
		  </tr>';
		$sqlAcc = "SELECT account.social_id AS loeschcode, safebox.password AS lagerpw
		FROM account.account 
		LEFT JOIN player.safebox 
		ON account.id=safebox.account_id 
		WHERE account.id='".$_SESSION['user_id']."'";

		$qryAcc = mysql_query($sqlAcc) or die(mysql_error());
		$getAcc = mysql_fetch_object($qryAcc);
		
		if(empty($getAcc->lagerpw)) $getAcc->lagerpw = '000000';
		  
		  echo'<tr>
			<th class="topLine">Cod stergere:</th>
			<td class="tdunkel">'.$getAcc->loeschcode.'</td>
		  </tr>
		</table>';
		
		echo'</div><div class="clear"></div>';
	}
  }
	
  else 
  {
 if(isset($_POST['userid'], $_POST['userpass'])) {
	$username = mysql_real_escape_string($_POST['userid']);
	$password = mysql_real_escape_string($_POST['userpass']);
	if(empty($username) || empty($password)) {
		echo '<p class="meldung">Toate campurile sunt obligatorii!</p>';
	} else {
		$errors = array();
		
		if(checkPwd($password) === false) {
			$errors[] = 'Parola este invalida!';
		}
		if(checkName($username) === false) {
			$errors[] = 'Numele de utilizator este invalid!';
		}
		if(checkLogin($username, $password) === false) {
			$errors[] = 'Numele de utilizator sau parola sunt invalide!';
		}
		
		if(!empty($errors)) {
			foreach($errors as $error) {
				echo '<p class="meldung">'.$error.'</p>';
			}
		} else {
			$sql = mysql_query("SELECT id FROM account.account WHERE login='{$username}' AND password=PASSWORD('{$password}')");
			$id = mysql_result($sql, 0);
			$_SESSION['user_name'] = $username;
			$_SESSION['user_id'] = $id;
			$_SESSION['user_admin'] = $id;
			echo '<p class="meldung">Ati fost autentificat cu succes! <br> Va rugam asteptati...</p>';
			echo '<meta http-equiv="refresh" content="2; url=http://digitalmt2.ro/index.php?s=login">';
		}
		
	}
  }
  ?>
<form action="index.php?s=login" method="POST">
  <input type="hidden" name="sent" value="login" />
  <table>
    <tr>
      <th style="padding-top: 10px;" class="topLine">User ID:</th>
      <td class="tdunkel"><input type="text" name="userid" maxlength="16" size="20"/></td>
    </tr>
    <tr>
      <th style="padding-top: 10px;" class="topLine">Parola:</th>
      <td class="thell"><input type="password" name="userpass" maxlength="16" size="20"/></td>
    </tr>
    <tr>
      <td class="topLine" style="text-align:center;" colspan="2"><input type="submit" name="submit" value="Login"/></td>
    </tr>
  </table>
  <p><a href="?s=register">Înregistrare</a> &bull; <a href="?s=lostpw">Parola uitată</a></p>
</form>
  <?PHP
  }
  ?>
   </div>
    <div class="bottom"></div>
</div>
