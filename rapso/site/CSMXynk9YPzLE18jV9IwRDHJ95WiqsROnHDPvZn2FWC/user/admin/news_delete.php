<?PHP
  if($_SESSION['user_admin']>=$adminRights['web_news']) {
?>

<h2>&#350;tergere &#351;tiri</h2>
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
          echo'<p><br/><h3>&nbsp;&nbsp;&nbsp;&#350;tirea a fost &#351;tears&#259; cu succes!</h3><br/></p>';
        }
        else 
        {
          echo'<p><br/><h3>&nbsp;&nbsp;&nbsp;&#350;tirea nu a putut fi &#351;tears&#259;!</h3><br/></p>';
        }

      }
      else
      {
        echo'<p><br/><h3>&nbsp;&nbsp;&nbsp;ID-ul introdus nu exist&#259;!</h3><br/></p>';
      }
      
    }
    else
    {
      echo'<p><br/><h3>&nbsp;&nbsp;&nbsp;ID-ul introdus nu este valid!</h3><br/></p>';
    }
    
    echo'<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>';
  }
  else {
    echo'<p><br/><h3>&nbsp;&nbsp;&nbsp;Nu ave&#355;i acces la aceast&#259; zon&#259;!</h3><br/></p>';
  }
?>