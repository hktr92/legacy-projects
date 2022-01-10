<?PHP
  if($_SESSION['user_admin']>=$adminRights['web_news']) {
?>

<h2>News bearbeiten</h2>
<?PHP

    if(isset($_GET['id']) && checkInt($_GET['id']))
    {
      $sqlNews = "SELECT id FROM ".SQL_HP_DB.".news WHERE id='".$_GET['id']."' LIMIT 1";
      $qryNews = mysql_query($sqlNews,$sqlHp);
      
      if(mysql_num_rows($qryNews)>0)
      {
      
        if(isset($_POST['submit']) && $_POST['submit']=="bearbeiten")
        {
          if(!empty($_POST['titel']) && !empty($_POST['inhalt']) && checkInt($_POST['kategorie']) && checkBetween($_POST['tag'],0,31) && checkBetween($_POST['monat'],1,12) && checkBetween($_POST['jahr'],1900,date("Y",time())+10) && checkBetween($_POST['stunde'],0,24) && checkBetween($_POST['minute'],0,59))
          {
            $zeitStempel = mktime($_POST['stunde'],$_POST['minute'],0,$_POST['monat'],$_POST['tag'],$_POST['jahr']);
            $anzeigen = (isset($_POST['anzeigen']) && $_POST['anzeigen']=="true") ? 1 : 0;
            $wichtig = (isset($_POST['wichtig']) && $_POST['wichtig']=="true") ? 1 : 0;
            
            
            $sqlNews = "UPDATE ".SQL_HP_DB.".news
            SET titel='".mysql_real_escape_string($_POST['titel'])."',
            inhalt='".mysql_real_escape_string($_POST['inhalt'])."',
            datum='".$zeitStempel."',
            hot='".$wichtig."',
            kategorie='".$_POST['kategorie']."',
            author='".$_SESSION['user_id']."',
            anzeigen='".$anzeigen."'
            WHERE id='".$_GET['id']."' LIMIT 1";
            
            if(mysql_query($sqlNews,$sqlHp))
            {
              echo'<p class="meldung">News wurden erfolgreich bearbeitet.</p>';
            }
            else 
            {
              echo'<p class="meldung">News konnten nicht bearbeitet werden.</p>';
            }
          }
        }
      
        $sqlNews2 = "SELECT * FROM ".SQL_HP_DB.".news WHERE id='".$_GET['id']."' LIMIT 1";
        $qryNews2 = mysql_query($sqlNews2,$sqlHp);
        
        $getNews = mysql_fetch_object($qryNews2);
        $nWichtig = ($getNews->hot>0) ? 'checked="checked"' : '';
        $nAnzeigen = ($getNews->anzeigen>0) ? 'checked="checked"' : '';
      ?>
        <form method="POST" action="index.php?s=admin&a=news_edit&id=<?PHP echo $_GET['id']; ?>">
          <table>
            <tr>
              <th class="topLine">Titel:</th>
              <td class="thell"><input type="text" size="40" maxlength="200" value="<?PHP echo $getNews->titel; ?>" name="titel"/></td>
            </tr>
            <tr>
              <th class="topLine">Inhalt:</th>
              <td class="tdunkel"><textarea rows="15" cols="90" name="inhalt"><?PHP echo $getNews->inhalt; ?></textarea></td>
            </tr>
            <tr>
              <th class="topLine">Datum:</th>
              <td class="tdunkel"><input type="text" size="2" maxlength="2" value="<?PHP echo date("d",$getNews->datum); ?>" name="tag"/>.<input type="text" size="2" value="<?PHP echo date("m",$getNews->datum); ?>" maxlength="2" name="monat"/>.<input type="text" size="4" maxlength="4" value="<?PHP echo date("Y",$getNews->datum); ?>" name="jahr"/> - <input type="text" size="2" maxlength="2" value="<?PHP echo date("H",$getNews->datum); ?>" name="stunde"/>:<input type="text" size="2" maxlength="2" value="<?PHP echo date("i",$getNews->datum); ?>" name="minute"/> Uhr</td>
            </tr>
            <tr>
              <th class="topLine">Kategorie:</th>
              <td class="thell">
                <?PHP listNewsKat($getNews->kategorie); ?>
              </td>
            </tr>
            <tr>
              <th class="topLine">Wichtige News:</th>
              <td class="tdunkel"><input <?PHP echo $nWichtig; ?> type="checkbox" name="wichtig" value="true"/></td>
            </tr>
            <tr>
              <th class="topLine">Anzeigen:</th>
              <td class="thell"><input <?PHP echo $nAnzeigen; ?> type="checkbox" name="anzeigen" value="true"/></td>
            </tr>
            <tr>
              <th class="topLine" colspan="2"><input type="submit" name="submit" value="bearbeiten"/></th>
            </tr>
          </table>
        </form>
      <?PHP
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