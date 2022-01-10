<?PHP
  
  if(isset($_POST['submit']) && ($_POST['submit']=="login" || $_POST['submit']=="LOGIN")) 
  {
    if(!empty($_POST['userid']) && !empty($_POST['userpass']) && checkAnum($_POST['userid']) && checkAnum($_POST['userpass'])) 
    {
      $sqlCmd = "SELECT id,login,coins,web_admin,email 
      FROM account.account 
      WHERE login 
      LIKE '".mysql_real_escape_string($_POST['userid'])."' 
      AND password=PASSWORD('".mysql_real_escape_string($_POST['userpass'])."') 
      LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlServ);
      if(mysql_num_rows($sqlQry)>0) 
      {
        $getAdmin = mysql_fetch_object($sqlQry);
        $_SESSION['user_id'] = $getAdmin->id;
        $_SESSION['user_name'] = $getAdmin->login;
        $_SESSION['user_admin'] = $getAdmin->web_admin;
        $_SESSION['user_coins'] = $getAdmin->coins;
        $_SESSION['user_email'] = $getAdmin->email;
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
    unset($_SESSION['user_email']);
  }
  else {
    $sqlCmd = "SELECT id,login,web_admin,coins,email FROM account.account WHERE web_ip='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."' AND id='".mysql_real_escape_string($_SESSION['user_id'])."' LIMIT 1";
    $sqlQry = mysql_query($sqlCmd,$sqlServ);
    if(mysql_num_rows($sqlQry)>0) 
    {
      $getAdmin = mysql_fetch_object($sqlQry);
      $_SESSION['user_id'] = $getAdmin->id;
      $_SESSION['user_name'] = $getAdmin->login;
      $_SESSION['user_admin'] = $getAdmin->web_admin;
      $_SESSION['user_coins'] = $getAdmin->coins;
      $_SESSION['user_email'] = $getAdmin->email;
      
    }
  }
  

?>