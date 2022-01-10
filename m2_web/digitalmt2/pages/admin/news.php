<?PHP
  if($_SESSION['user_admin']>=$adminRights['web_news']) {
?>

<h2>News&uuml;bersicht</h2>
<p>Hier k&ouml;nnen neue News hinzugef&uuml;gt und vorhandene bearbeitet werden.</p>

<h3>News hinzuf&uuml;gen</h3>

<?PHP
  if(isset($_POST['submit']) && $_POST['submit']=="eintragen")
  {
    if(!empty($_POST['titel']) && !empty($_POST['inhalt']) && checkInt($_POST['kategorie']) && checkBetween($_POST['tag'],0,31) && checkBetween($_POST['monat'],1,12) && checkBetween($_POST['jahr'],1900,date("Y",time())+10) && checkBetween($_POST['stunde'],0,24) && checkBetween($_POST['minute'],0,59))
    {
      $zeitStempel = mktime($_POST['stunde'],$_POST['minute'],0,$_POST['monat'],$_POST['tag'],$_POST['jahr']);
      // id 	titel 	inhalt 	datum 	hot 	kategorie 	author 	anzeigen
      
      $anzeigen = (isset($_POST['anzeigen']) && $_POST['anzeigen']=="true") ? 1 : 0;
      $wichtig = (isset($_POST['wichtig']) && $_POST['wichtig']=="true") ? 1 : 0;
      
      
      $sqlNews = "INSERT INTO ".SQL_HP_DB.".news
      VALUES (NULL,'".mysql_real_escape_string($_POST['titel'])."','".mysql_real_escape_string($_POST['inhalt'])."','".$zeitStempel."','".$wichtig."','".$_POST['kategorie']."','".$_SESSION['user_id']."','".$anzeigen."')";
      
      if(mysql_query($sqlNews,$sqlHp))
      {
        echo'<p class="meldung">News wurden erfolgreich eingetragen.</p>';
      }
      else 
      {
        echo'<p class="meldung">News konnten nicht in die Datenbank gespeichert werden.</p>';
      }
    }
  }
?>

<form method="POST" action="index.php?s=admin&a=news">
  
  <table>
    <tr>
      <th class="topLine">Titel:</th>
      <td class="thell"><input type="text" size="40" maxlength="200" name="titel"/></td>
    </tr>
    <tr>
      <th class="topLine">Inhalt:</th>
      <td class="tdunkel"><textarea rows="15" cols="90" name="inhalt"></textarea></td>
    </tr>
    <tr>
      <th class="topLine">Datum:</th>
      <td class="tdunkel"><input type="text" size="2" maxlength="2" value="<?PHP echo date("d",time()); ?>" name="tag"/>.<input type="text" size="2" value="<?PHP echo date("m",time()); ?>" maxlength="2" name="monat"/>.<input type="text" size="4" maxlength="4" value="<?PHP echo date("Y",time()); ?>" name="jahr"/> - <input type="text" size="2" maxlength="2" value="<?PHP echo date("H",time()); ?>" name="stunde"/>:<input type="text" size="2" maxlength="2" value="<?PHP echo date("i",time()); ?>" name="minute"/> Uhr</td>
    </tr>
    <tr>
      <th class="topLine">Kategorie:</th>
      <td class="thell">
        <?PHP listNewsKat(); ?>
      </td>
    </tr>
    <tr>
      <th class="topLine">Wichtige News:</th>
      <td class="tdunkel"><input type="checkbox" name="wichtig" value="true"/></td>
    </tr>
    <tr>
      <th class="topLine">Anzeigen:</th>
      <td class="thell"><input type="checkbox" name="anzeigen" value="true"/></td>
    </tr>
    <tr>
      <th class="topLine" colspan="2"><input type="submit" name="submit" value="eintragen"/></th>
    </tr>
  </table>
</form>

<h3>News-Auflistung</h3>
<table>
  <tr>
    <th class="topLine">ID</th>
    <th class="topLine">Datum</th>
    <th class="topLine">Titel</th>
    <th class="topLine">Kategorie</th>
    <th class="topLine">Wichtig</th>
    <th class="topLine">Anzeigen</th>
    <th class="topLine">L&ouml;schen</th>
  </tr>
  <?PHP
    $sqlNews = "SELECT * FROM ".SQL_HP_DB.".news ORDER BY datum DESC";
    $qryNews = mysql_query($sqlNews,$sqlHp);
    $x=0;
    while($getNews = mysql_fetch_object($qryNews))
    {
      $nWichtig = ($getNews->hot>0) ? "./img/success.gif" : "./img/fail.gif";
      $nAnzeigen = ($getNews->anzeigen>0) ? "./img/success.gif" : "./img/fail.gif";
      
      $nTitel = (strlen($getNews->titel)>60) ? substr($getNews->titel,0,strpos($getNews->titel,' ',60)).'...' : $getNews->titel;
      
      $zF = ($x%2==0) ? "tdunkel" : "thell";
      echo'<tr>
        <td class="'.$zF.'">'.$getNews->id.'</td>
        <td class="'.$zF.'">'.getDatum($getNews->datum).'</td>
        <td class="'.$zF.'"><a href="index.php?s=admin&a=news_edit&id='.$getNews->id.'">'.$nTitel.'</a></td>
        <td class="'.$zF.'">'.$newsKategorien[$getNews->kategorie].'</td>
        <td class="'.$zF.'"><img src="'.$nWichtig.'" alt="wichtig"/></td>
        <td class="'.$zF.'"><img src="'.$nAnzeigen.'" alt="wichtig"/></td>
        <td class="'.$zF.'"><a href="index.php?s=admin&a=news_delete&id='.$getNews->id.'"><img src="./img/fail.gif" alt="delete"/></a></td>
      </tr>';
      $x++;
    }
  ?>
</table>
<?PHP
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>