<?PHP
  if($_SESSION['user_admin']>=$adminRights['is_items']) {
    if(isset($_GET['id']) && checkInt($_GET['id'])) {
      $sqlCmd="DELETE FROM ".SQL_HP_DB.".is_items WHERE id='".$_GET['id']."' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlHp);
      if($sqlQry) { echo'<p class="meldung">Itemul a fost &#351;ters cu succes din magazinul de iteme.</p>'; }
    }
    else { echo '<p class="meldung">ID-ul nu este valid.</p>'; }
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?>