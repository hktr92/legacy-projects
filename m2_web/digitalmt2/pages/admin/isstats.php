<?PHP
  if($_SESSION['user_admin']>=9) 
  {
    $isPath = "./pages/admin/isstats/";
    
    if(isset($_GET['is']) && !empty($_GET['is']))
    {
      if(file_exists($isPath.$_GET['is'].".php")) 
      {
        include($isPath.$_GET['is'].".php");
      }
      else {
        include($isPath."home.php");
      }
    } else 
    {
      include($isPath."home.php");
    }
  }
  else
  {
    echo'<p class="meldung">Sie sind nicht f&uuml;r diesen Bereich berechtigt.</p>';
  }
?>