<?PHP
  if($_SESSION['user_admin']>=$adminRights['is_kategorien']) {
  
    echo'<h2>Administrare - categoriile magazinului de iteme</h2>';
    echo'<p><br/>&nbsp;&nbsp;Aici pute&#355;i edita, ad&#259;uga & &#351;terge categoriile magazinului de iteme.<br/><br/></p>';
    
    if(isset($_POST['submit']) && $_POST['submit']=="Adauga") {
      if(!empty($_POST['titel'])) {
        if($_POST['art']=="edit" && checkInt($_POST['katid'])) {
          $sqlCmd="UPDATE ".SQL_HP_DB.".is_kategorien SET titel='".$_POST['titel']."' WHERE id='".$_POST['katid']."'";
          $sqlQry=mysql_query($sqlCmd,$sqlHp);
          if($sqlQry) {
            echo'<p class="meldung">Categoria a fost editat&#259; cu succes.</p>';
          }
        }
        else {
        
          $sqlCmd="INSERT INTO ".SQL_HP_DB.".is_kategorien (titel) VALUES ('".$_POST['titel']."')";
          $sqlQry=mysql_query($sqlCmd,$sqlHp);
          if($sqlQry) {
            echo'<p class="meldung">Categoria a fost creat&#259; cu succes.</p>';
          }
          
        }
      }
      else {
        echo'<p class="meldung">Introduce&#355;i un titlu.</p>';
      }
    }
    
    if(isset($_GET['delete']) && checkInt($_GET['delete'])) {
      $sqlCmd="DELETE FROM ".SQL_HP_DB.".is_kategorien WHERE id='".$_GET['delete']."' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlHp);
      if($sqlQry) {
        echo'<p class="meldung">Categoria a fost &#351;tears&#259; cu succes.</p>';
      }
      echo'<h3>&nbsp;&nbsp;Editare categorie</h3>';
      $inputs = '<input type="hidden" name="art" value="add"/>';
    }
    elseif(isset($_GET['edit']) && checkInt($_GET['edit'])) {
      $sqlCmd="SELECT * FROM ".SQL_HP_DB.".is_kategorien WHERE id='".$_GET['edit']."' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlHp);
      $getTitel=mysql_fetch_object($sqlQry);
      echo'<h3>&nbsp;&nbsp;Editare Categorie</h3>';
      $inputs = '<input type="hidden" name="art" value="edit"/>
      <input type="hidden" name="katid" value="'.$_GET['edit'].'"/>';
    }
    else {
      echo'<h3>&nbsp;&nbsp;Ad&#259;ugare categorie<br/><br/></h3>';
      $inputs = '<input type="hidden" name="art" value="add"/>';
    }
    ?>
      <form action="index.php?s=admin&a=is_cat" method="POST">
        <?PHP echo $inputs; ?>
        <table>
          <th class="topLine">&nbsp;&nbsp;Titlul categoriei: </th>
          <td class="tdunkel"><input type="text" size="20" maxlength="50" value="<?PHP if(isset($getTitel)) echo $getTitel->titel; ?>" name="titel"/>&nbsp;<input type="submit" value="Adauga" name="submit"/><?PHP if(isset($_GET['edit'])) echo'&nbsp;<a href="index.php?s=admin&a=is_cat">&#206;napoi la &laquo;ad&#259;ugare&raquo;</a>'; ?></td>
        </table>
      </form>
    <?PHP
    echo'<br/><h3>&nbsp;&nbsp;Lista categoriilor</h3><br/>';
    $sqlCmd="SELECT * FROM ".SQL_HP_DB.".is_kategorien ORDER BY titel ASC";
    $sqlQry=mysql_query($sqlCmd,$sqlHp);
    $x=0;
    echo'<table>';
    echo'<tr>
      <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
      <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;Titlu</th>
      <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;Op&#355;iuni</th>
    </tr>';
    while($getKats=mysql_fetch_object($sqlQry)) {
      $zF=($x%2) ? "tdunkel" : "thell";
      echo'<tr>
        <td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$getKats->id.'</td>
        <td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;'.$getKats->titel.'</td>
        <td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=is_cat&edit='.$getKats->id.'">Editare</a> / <a href="index.php?s=admin&a=is_cat&delete='.$getKats->id.'">&#350;tergere</a></td>
      </tr>';
      $x++;
    }
    echo'</table>';
  
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?><br/>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>