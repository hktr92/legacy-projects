<?PHP
  if($_SESSION['user_admin']>=$adminRights['web_news']) {
?>

<h2>&#350;tiri prezentare general&#259;</h2>


<h3><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ad&#259;ugare &#351;tiri</h3>

<?PHP
  if(isset($_POST['submit']) && $_POST['submit']=="Adauga")
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
        echo'<p><br/><h3>&nbsp;&nbsp;&nbsp;Ad&#259;ugarea &#351;tiri a fost facut&#259; cu succes.</h3><br/></p>';
      }
      else 
      {
        echo'<p><br/><h3>&nbsp;&nbsp;&nbsp;Ad&#259;ugarea &#351;tiri a e&#351;uat.</h3><br/></p>';
      }
    }
  }
?>

<form method="POST" action="index.php?s=admin&a=news">
  
  <table>
    <tr>
      <th class="topLine">Titlu:</th>
      <td class="thell"><input type="text" size="40" maxlength="200" name="titel"/></td>
    </tr>
    <tr><br/>
      <th class="topLine">Con&#355;inut:</th>
      <td class="tdunkel"><textarea rows="15" cols="40" name="inhalt"></textarea></td>
    </tr>
    <tr>
      <th class="topLine">Data:</th>
      <td class="tdunkel"><input type="text" size="2" maxlength="2" value="<?PHP echo date("d",time()); ?>" name="tag"/>.<input type="text" size="2" value="<?PHP echo date("m",time()); ?>" maxlength="2" name="monat"/>.<input type="text" size="4" maxlength="4" value="<?PHP echo date("Y",time()); ?>" name="jahr"/> - <input type="text" size="2" maxlength="2" value="<?PHP echo date("H",time()); ?>" name="stunde"/>:<input type="text" size="2" maxlength="2" value="<?PHP echo date("i",time()); ?>" name="minute"/></td>
    </tr>
    <tr>
      <th class="topLine">Categorie:</th>
      <td class="thell">
        <?PHP listNewsKat(); ?>
      </td>
    </tr>
    <tr>
      <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&#350;tire important&#259;?</th>
      <td class="tdunkel"><input type="checkbox" name="wichtig" value="true"/></td>
    </tr>
    <tr>
      <th class="topLine">Arat&#259;?</th>
      <td class="thell"><input type="checkbox" name="anzeigen" value="true"/></td>
    </tr>
    <tr>
      <th class="topLine" colspan="2"><input type="submit" name="submit" value="Adauga"/></th>
    </tr>
  </table>
</form>

<h3>&nbsp;&nbsp;&nbsp;&nbsp;Lista &#351;tirilor<br/></h3>
<table>
  <tr>
    <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th class="topLine">Data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th class="topLine">Titlu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th class="topLine">Categorie&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th class="topLine">Important&#259;?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th class="topLine">Arat&#259;?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th class="topLine">&#350;tergere?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  </tr>
  <?PHP
    $sqlNews = "SELECT * FROM ".SQL_HP_DB.".news ORDER BY datum DESC";
    $qryNews = mysql_query($sqlNews,$sqlHp);
    $x=0;
    while($getNews = mysql_fetch_object($qryNews))
    {
      $nWichtig = ($getNews->hot>0) ? "./img/icons/success.gif" : "./img/icons/fail.gif";
      $nAnzeigen = ($getNews->anzeigen>0) ? "./img/icons/success.gif" : "./img/icons/fail.gif";
      
      $nTitel = (strlen($getNews->titel)>60) ? substr($getNews->titel,0,strpos($getNews->titel,' ',60)).'...' : $getNews->titel;
      
      $zF = ($x%2==0) ? "tdunkel" : "thell";
      echo'<tr>
        <td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$getNews->id.'</td>
        <td class="'.$zF.'">'.getDatum($getNews->datum).'&nbsp;&nbsp;&nbsp;</td>
        <td class="'.$zF.'"><a href="index.php?s=admin&a=news_edit&id='.$getNews->id.'">'.$nTitel.'</a>&nbsp;&nbsp;&nbsp;</td>
        <td class="'.$zF.'">'.$newsKategorien[$getNews->kategorie].'</td>
        <td class="'.$zF.'"><img src="'.$nWichtig.'" alt="wichtig"/></td>
        <td class="'.$zF.'"><img src="'.$nAnzeigen.'" alt="wichtig"/></td>
        <td class="'.$zF.'"><a href="index.php?s=admin&a=news_delete&id='.$getNews->id.'"><img src="./img/icons/fail.gif" alt="delete"/></a></td>
      </tr>';
      $x++;
    }
  ?>
</table>
<?PHP
  }
  else {
    echo'<p><br/><h3>&nbsp;&nbsp;&nbsp;Nu ave&#355;i acces la aceast&#259; zon&#259;!</h3><br/></p>';
  }
?>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>