<?PHP
  if($_SESSION['user_admin']>=$adminRights['db_attr']) {
?>

<h2>Admin - &laquo;item_attr&raquo; bearbeiten</h2>
<?PHP
if(isset($_POST['submit']) && $_POST['submit']=="aktualisieren") {
  $dsLaenge = count($_POST['apply']);
  for($i=0;$i<$dsLaenge;$i++) {
    if(checkInt($_POST['ear'][$i]) && checkInt($_POST['prob'][$i]) && checkInt($_POST['lv1'][$i]) && checkInt($_POST['lv2'][$i]) && checkInt($_POST['lv3'][$i]) && checkInt($_POST['lv4'][$i]) && checkInt($_POST['lv5'][$i]) && checkInt($_POST['weapon'][$i]) && checkInt($_POST['body'][$i]) && checkInt($_POST['wrist'][$i]) && checkInt($_POST['foots'][$i]) && checkInt($_POST['neck'][$i]) && checkInt($_POST['head'][$i]) && checkInt($_POST['shield'][$i])) {
      $sqlCmd="UPDATE player.item_attr
      SET 
      prob='".$_POST['prob'][$i]."', lv1='".$_POST['lv1'][$i]."', lv2='".$_POST['lv2'][$i]."', lv3='".$_POST['lv3'][$i]."', lv4='".$_POST['lv4'][$i]."', 
      lv5='".$_POST['lv5'][$i]."', weapon='".$_POST['weapon'][$i]."', body='".$_POST['body'][$i]."', wrist='".$_POST['wrist'][$i]."', 
      foots='".$_POST['foots'][$i]."', neck='".$_POST['neck'][$i]."', head='".$_POST['head'][$i]."', shield='".$_POST['shield'][$i]."', ear='".$_POST['ear'][$i]."' 
      WHERE apply='".$_POST['apply'][$i]."' 
      LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlServ);
    }
  }
}
$sqlCmd = "SELECT * FROM player.item_attr";
$sqlQry = mysql_query($sqlCmd,$sqlServ); 
?>
<p>Hier kann die Tabelle &laquo;item_attr&raquo; bearbeitet werden. Sie enthält die Daten zu den Boni. <br/><b>Die Daten sind sehr sensibel, bitte vorsichtig mit Änderungen umgehen.</b></p>
<form action="index.php?s=admin&a=item_attr" method="POST">
  <table class="small">
    <tr>
      <th class="topLine">apply</th>
      <th class="topLine">prob</th>
      <th class="topLine">lv1</th>
      <th class="topLine">lv2</th>
      <th class="topLine">lv3</th>
      <th class="topLine">lv4</th>
      <th class="topLine">lv5</th>
      <th class="topLine">weapon</th>
      <th class="topLine">body</th>
      <th class="topLine">wrist</th>
      <th class="topLine">foots</th>
      <th class="topLine">neck</th>
      <th class="topLine">head</th>
      <th class="topLine">shield</th>
      <th class="topLine">ear</th>
    </tr>
    <?PHP
      $x=0;
      while($getAttr=mysql_fetch_object($sqlQry)) {
        if(!empty($getAttr->apply)) {
          $zF = ($x%2==0) ? "tdunkel" : "thell";
          echo'<tr>';
          echo'<td class="'.$zF.'"><input type="hidden" name="apply[]" value="'.$getAttr->apply.'"/>'.$getAttr->apply.'</td>';
          echo'<td class="'.$zF.'"><input size="3" maxlength="10" type="text" name="prob[]" value="'.$getAttr->prob.'"/></td>';
          echo'<td class="'.$zF.'"><input size="3" maxlength="10" type="text" name="lv1[]" value="'.$getAttr->lv1.'"/></td>';
          echo'<td class="'.$zF.'"><input size="3" maxlength="10" type="text" name="lv2[]" value="'.$getAttr->lv2.'"/></td>';
          echo'<td class="'.$zF.'"><input size="3" maxlength="10" type="text" name="lv3[]" value="'.$getAttr->lv3.'"/></td>';
          echo'<td class="'.$zF.'"><input size="3" maxlength="10" type="text" name="lv4[]" value="'.$getAttr->lv4.'"/></td>';
          echo'<td class="'.$zF.'"><input size="3" maxlength="10" type="text" name="lv5[]" value="'.$getAttr->lv5.'"/></td>';
          echo'<td class="'.$zF.'"><input size="3" maxlength="10" type="text" name="weapon[]" value="'.$getAttr->weapon.'"/></td>';
          echo'<td class="'.$zF.'"><input size="3" maxlength="10" type="text" name="body[]" value="'.$getAttr->body.'"/></td>';
          echo'<td class="'.$zF.'"><input size="3" maxlength="10" type="text" name="wrist[]" value="'.$getAttr->wrist.'"/></td>';
          echo'<td class="'.$zF.'"><input size="3" maxlength="10" type="text" name="foots[]" value="'.$getAttr->foots.'"/></td>';
          echo'<td class="'.$zF.'"><input size="3" maxlength="10" type="text" name="neck[]" value="'.$getAttr->neck.'"/></td>';
          echo'<td class="'.$zF.'"><input size="3" maxlength="10" type="text" name="head[]" value="'.$getAttr->head.'"/></td>';
          echo'<td class="'.$zF.'"><input size="3" maxlength="10" type="text" name="shield[]" value="'.$getAttr->shield.'"/></td>';
          echo'<td class="'.$zF.'"><input size="3" maxlength="10" type="text" name="ear[]" value="'.$getAttr->ear.'"/></td>';
          echo'</tr>';
          $x++;
        }
      }
    ?>
    <tr>
      <td colspan="15" class="topLine" style="text-align:center;"><input type="submit" name="submit" value="aktualisieren" /> &bull; <input type="reset" value="zurücksetzen" /></td>
    </tr>
  </table>
</form>
<?PHP
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>