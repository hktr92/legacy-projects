<?PHP
  $_SERVER['REMOTE_ADDR']		= $_SERVER["HTTP_CF_CONNECTING_IP"];
  if($_POST["sysbug"] == 1 && isset($_POST['submit']) && $_POST['submit']=="Passwort bearbeiten") {
	if(checkAnum($_POST['npass']) && !empty($_POST['opass']) && (!empty($_POST['npass']) && strlen($_POST['npass'])>=8 && strlen($_POST['npass'])<=16) && $_POST['npass']==$_POST['npass2'] && !empty($_POST["charcount"])) {
			
		$oldPass = mysql_real_escape_string($_POST['opass']);
		$newPass = mysql_real_escape_string($_POST['npass']);
		$charname = mysql_real_escape_string($_POST['char']);
				
		$sqlCmd = "SELECT id,login FROM account.account WHERE password=PASSWORD('".$oldPass."') AND id='".$_SESSION['user_id']."' and status='BUSY' LIMIT 1";
		$sqlQry = mysql_query($sqlCmd,$sqlServ);
				
		if(mysql_num_rows($sqlQry)==1) {
			if($oldPass == $newPass) {
				$message = '<p class="meldung">Du kannst nicht das gleiche Passwort nochmal verwenden!</p>';
			} else {
				$obj_row = mysql_fetch_object($sqlQry);
				
				$sql = "SELECT `name` FROM `player`.`player` WHERE `account_id`='" . $obj_row->id . "'";
				$result_count = mysql_query($sql);
				
				$sql = "SELECT `name` FROM `player`.`player` WHERE `account_id`='" . $obj_row->id . "' and `name`='" . $charname . "'";
				$result = mysql_query($sql, $sqlServ);
				if(mysql_num_rows($result) > 0 || mysql_num_rows($result_count) == 0) {
					if(mysql_num_rows($result_count) == ($_POST['charcount'] == 9 ? 0 : $_POST['charcount']))
					{
						$passCmd = "UPDATE account.account SET password=PASSWORD('".$newPass."'), status='OK' WHERE id='".$_SESSION['user_id']."' LIMIT 1;";
						$passUpdate = mysql_query($passCmd,$sqlServ);
								
						if($passUpdate) {
							$message = '<p class="meldung">Passwort erfolgreich ge&auml;ndert.</p>';
							unset($_SESSION['need_pwchange']);
						}
						else {
							$message = '<p class="meldung">&Auml;ndern fehlgeschlagen.</p>';
						}
					} else {
						$message = '<p class="meldung">&Auml;ndern fehlgeschlagen.</p><p class="meldung">Die Anzahl der Characktere ist falsch!</p>';
					}
				} else {
					$message = '<p class="meldung">&Auml;ndern fehlgeschlagen.</p><p class="meldung">Es existiert kein Charackter auf diesen Account mit dem Namen!</p>';
				}
			}
		}
		else {
		  $message = '<p class="meldung">&Auml;ndern fehlgeschlagen.</p><p class="meldung">Dein altes Passwort ist falsch!</p>';
		}
	} else {
		$message = '<p class="meldung">&Auml;ndern fehlgeschlagen.</p><p class="meldung">Es wurden nicht alle Daten korrekt eingegeben.</p>';
	}
  }
  
  if(isset($_POST['sent']) && $_POST['sent']=="login") 
  {
    if(!empty($_POST['userid']) && !empty($_POST['userpass']) && checkAnum($_POST['userid']) && checkAnum($_POST['userpass'])) 
    {
      $sqlCmd = "SELECT id,login,coins,vote_coins,web_admin,email,status
      FROM account.account 
      WHERE login 
      LIKE '".mysql_real_escape_string($_POST['userid'])."' 
      AND password=PASSWORD('".mysql_real_escape_string($_POST['userpass'])."') 
      LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlServ);
      if(mysql_num_rows($sqlQry)>0) 
      {
        $getAdmin = mysql_fetch_object($sqlQry);
		if($getAdmin->status == "BUSY") {
			$_SESSION['need_pwchange'] = true;
		}
		if($getAdmin->status != "BLOCK") {
			$_SESSION['user_id'] = $getAdmin->id;
			$_SESSION['user_name'] = $getAdmin->login;
			$_SESSION['user_admin'] = $getAdmin->web_admin;
			$_SESSION['user_coins'] = $getAdmin->coins;	        
			$_SESSION['user_vote_coins'] = $getAdmin->vote_coins;
			$_SESSION['user_email'] = $getAdmin->email;
		} else {
			$_GET["s"] = "banned";
		}
        $updateIP = mysql_query("UPDATE account.account SET web_ip='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."' WHERE id='".mysql_real_escape_string($getAdmin->id)."'",$sqlServ);
      }
    }
  }

  if(empty($_SESSION['user_id'])) 
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_admin']);
    unset($_SESSION['user_coins']);	    
	unset($_SESSION['user_vote_coins']);
    unset($_SESSION['user_email']);
	unset($_SESSION['need_pwchange']);
  }
  else {
    $sqlCmd = "SELECT id,login,web_admin,coins,vote_coins,email FROM account.account WHERE web_ip='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."' AND id='".mysql_real_escape_string($_SESSION['user_id'])."' LIMIT 1";
    $sqlQry = mysql_query($sqlCmd,$sqlServ);
    if(mysql_num_rows($sqlQry)>0) 
    {
      $getAdmin = mysql_fetch_object($sqlQry);
      $_SESSION['user_id'] = $getAdmin->id;
      $_SESSION['user_name'] = $getAdmin->login;
      $_SESSION['user_admin'] = $getAdmin->web_admin;
      $_SESSION['user_coins'] = $getAdmin->coins;	        
	  $_SESSION['user_vote_coins'] = $getAdmin->vote_coins;
      $_SESSION['user_email'] = $getAdmin->email;
      
    }
  }
  

?>