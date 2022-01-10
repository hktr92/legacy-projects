<?PHP
  if($_SESSION['user_admin']>=$adminRights['web_news']) {
?>

<h2>Administrare -  editare &#351;tiri</h2>
<?PHP

    if(isset($_GET['id']) && checkInt($_GET['id']))
    {
      $sqlNews = "SELECT id FROM ".SQL_HP_DB.".news WHERE id='".$_GET['id']."' LIMIT 1";
      $qryNews = mysql_query($sqlNews,$sqlHp);
      
      if(mysql_num_rows($qryNews)>0)
      {
      
        if(isset($_POST['submit']) && $_POST['submit']=="Actualizare")
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
              echo'<p><br/><h3>&nbsp;&nbsp;&nbsp;&#350;tirea a fost editat&#259; cu succes.</h3><br/></p>';
            }
            else 
            {
              echo'<p><br/><h3>&nbsp;&nbsp;&nbsp;&#350;tirea nu a putut fi editat&#259;.</h3><br/></p>';
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
          <table><br>
            <tr>
              <th class="topLine">Titlu:</th>
              <td class="thell"><input type="text" size="40" maxlength="200" value="<?PHP echo $getNews->titel; ?>" name="titel"/></td>
            </tr>
            <tr>
              <th class="topLine">Con&#355;inut:</th>
              <td class="tdunkel"><textarea rows="15" cols="40" name="inhalt"><?PHP echo $getNews->inhalt; ?></textarea></td>
            </tr>
            <tr>
              <th class="topLine">Data:</th>
              <td class="tdunkel"><input type="text" size="2" maxlength="2" value="<?PHP echo date("d",$getNews->datum); ?>" name="tag"/>.<input type="text" size="2" value="<?PHP echo date("m",$getNews->datum); ?>" maxlength="2" name="monat"/>.<input type="text" size="4" maxlength="4" value="<?PHP echo date("Y",$getNews->datum); ?>" name="jahr"/> - <input type="text" size="2" maxlength="2" value="<?PHP echo date("H",$getNews->datum); ?>" name="stunde"/>:<input type="text" size="2" maxlength="2" value="<?PHP echo date("i",$getNews->datum); ?>" name="minute"/> 
             </td>
            </tr>
            <tr>
              <th class="topLine">Categorie:</th>
              <td class="thell">
                <?PHP listNewsKat($getNews->kategorie); ?>
              </td>
            </tr>
            <tr>
              <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&#350;tire important&#259;?</th>
              <td class="tdunkel"><input <?PHP echo $nWichtig; ?> type="checkbox" name="wichtig" value="true"/></td>
            </tr>
            <tr>
              <th class="topLine">Arat&#259;?</th>
              <td class="thell"><input <?PHP echo $nAnzeigen; ?> type="checkbox" name="anzeigen" value="true"/></td>
            </tr>
            <tr>
              <th class="topLine" colspan="2"><input type="submit" name="submit" value="Actualizare"/></th>
            </tr>
          </table>
        </form>
      <?PHP
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