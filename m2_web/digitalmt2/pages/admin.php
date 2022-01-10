<?PHP
  if($_SESSION['user_admin']>0) 
  {
    $adminPath = "./pages/admin/";
    
    if(isset($_GET['a']) && !empty($_GET['a']))
    {
      if(file_exists($adminPath.$_GET['a'].".php")) 
      {
        include($adminPath.$_GET['a'].".php");
      }
      else {
        include($adminPath."home.php");
      }
    } else 
    {
      include($adminPath."home.php");
    }
  }
  else
  {
    echo'<p class="meldung">Sie sind nicht f&uuml;r diesen Bereich berechtigt.</p>';
  }
?>