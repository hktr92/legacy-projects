<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Kategorien</h3>
        <div class="big-line"></div><?PHP
  if($_SESSION['user_admin']>=$adminRights['is_kategorien']) {
  

    echo'<p>Hier k&ouml;nnen Kategorien des Itemshops bearbeitet werden.</p>';
    
    if(isset($_POST['submit']) && $_POST['submit']=="bearbeiten") {
      if(!empty($_POST['titel'])) {
        if($_POST['art']=="edit" && checkInt($_POST['katid'])) {
          $sqlCmd="UPDATE ".SQL_HP_DB.".is_kategorien SET titel='".$_POST['titel']."' WHERE id='".$_POST['katid']."'";
          $sqlQry=mysql_query($sqlCmd,$sqlHp);
          if($sqlQry) {
            echo'<p class="meldung">Kategorie erfolgreich bearbeitet</p>';
          }
        }
        else {
        
          $sqlCmd="INSERT INTO ".SQL_HP_DB.".is_kategorien (titel) VALUES ('".$_POST['titel']."')";
          $sqlQry=mysql_query($sqlCmd,$sqlHp);
          if($sqlQry) {
            echo'<p class="meldung">Kategorie erfolgreich eingetragen</p>';
          }
          
        }
      }
      else {
        echo'<p class="meldung">Es muss ein Titel eingegeben werden.</p>';
      }
    }
    
    if(isset($_GET['delete']) && checkInt($_GET['delete'])) {
      $sqlCmd="DELETE FROM ".SQL_HP_DB.".is_kategorien WHERE id='".$_GET['delete']."' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlHp);
      if($sqlQry) {
        echo'<p class="meldung">Kategorie erfolgreich gel&ouml;scht</p>';
      }
      echo'<h3>Hinzuf&uuml;gen</h3>';
      $inputs = '<input type="hidden" name="art" value="add"/>';
    }
    elseif(isset($_GET['edit']) && checkInt($_GET['edit'])) {
      $sqlCmd="SELECT * FROM ".SQL_HP_DB.".is_kategorien WHERE id='".$_GET['edit']."' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlHp);
      $getTitel=mysql_fetch_object($sqlQry);
      echo'<h3>Bearbeiten</h3>';
      $inputs = '<input type="hidden" name="art" value="edit"/>
      <input type="hidden" name="katid" value="'.$_GET['edit'].'"/>';
    }
    else {
      echo'<h3>Hinzuf&uuml;gen</h3>';
      $inputs = '<input type="hidden" name="art" value="add"/>';
    }
    ?>
      <form action="index.php?s=admin&a=is_kat" method="POST">
        <?PHP echo $inputs; ?>
        <table>
          <th class="topLine">Titel der Kategorie</th>
          <td class="tdunkel"><input type="text" size="50" maxlength="50" value="<?PHP if(isset($getTitel)) echo $getTitel->titel; ?>" name="titel"/>&nbsp;<input type="submit" value="bearbeiten" name="submit"/><?PHP if(isset($_GET['edit'])) echo'&nbsp;<a href="index.php?s=admin&a=is_kat">wechseln zu &laquo;hinzuf&uuml;gen&raquo;</a>'; ?></td>
        </table>
      </form>
    <?PHP
    echo'<h3>Auflistung</h3>';
    $sqlCmd="SELECT * FROM ".SQL_HP_DB.".is_kategorien ORDER BY titel ASC";
    $sqlQry=mysql_query($sqlCmd,$sqlHp);
    $x=0;
    echo'<table>';
    echo'<tr>
      <th class="topLine">KatID</th>
      <th class="topLine">Titel</th>
      <th class="topLine">Funktionen</th>
    </tr>';
    while($getKats=mysql_fetch_object($sqlQry)) {
      $zF=($x%2) ? "tdunkel" : "thell";
      echo'<tr>
        <td class="'.$zF.'">'.$getKats->id.'</td>
        <td class="'.$zF.'">'.$getKats->titel.'</td>
        <td class="'.$zF.'"><a href="index.php?s=admin&a=is_kat&edit='.$getKats->id.'">bearbeiten</a> / <a href="index.php?s=admin&a=is_kat&delete='.$getKats->id.'">l&ouml;schen</a></td>
      </tr>';
      $x++;
    }
    echo'</table>';
  
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>    </div>
    <div class="bottom"></div>
</div>