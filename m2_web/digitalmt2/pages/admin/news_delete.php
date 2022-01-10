<?PHP
  if($_SESSION['user_admin']>=$adminRights['web_news']) {
?>

<h2>News l&ouml;schen</h2>
<?PHP

    if(isset($_GET['id']) && checkInt($_GET['id']))
    {
      $sqlNews = "SELECT id FROM ".SQL_HP_DB.".news WHERE id='".$_GET['id']."' LIMIT 1";
      $qryNews = mysql_query($sqlNews,$sqlHp);
      
      if(mysql_num_rows($qryNews)>0)
      {
      
        $sqlNews = "DELETE FROM ".SQL_HP_DB.".news
        WHERE id='".$_GET['id']."' LIMIT 1";
        
        if(mysql_query($sqlNews,$sqlHp))
        {
          echo'<p class="meldung">News wurden erfolgreich gel&ouml;scht.</p>';
        }
        else 
        {
          echo'<p class="meldung">News konnten nicht gel&ouml;scht werden.</p>';
        }

      }
      else
      {
        echo'<p class="meldung">Diese ID existiert nicht.</p>';
      }
      
    }
    else
    {
      echo'<p class="meldung">Diese ID ist nicht g&uuml;ltig.</p>';
    }
    
    echo'<p><a href="index.php?s=admin&a=news">zur&uuml;ck</a></p>';
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>