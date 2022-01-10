<?PHP
  if($_SESSION['user_admin']>=$adminRights['db_attr_rare']) {
?>

<h2>Administrare - editare item_attr_rare</h2>
<?PHP
if(isset($_POST['submit']) && $_POST['submit']=="Actualizare") {
  $dsLaenge = count($_POST['apply']);
  for($i=0;$i<$dsLaenge;$i++) {
    if(checkInt($_POST['ear'][$i]) && checkInt($_POST['prob'][$i]) && checkInt($_POST['lv1'][$i]) && checkInt($_POST['lv2'][$i]) && checkInt($_POST['lv3'][$i]) && checkInt($_POST['lv4'][$i]) && checkInt($_POST['lv5'][$i]) && checkInt($_POST['weapon'][$i]) && checkInt($_POST['body'][$i]) && checkInt($_POST['wrist'][$i]) && checkInt($_POST['foots'][$i]) && checkInt($_POST['neck'][$i]) && checkInt($_POST['head'][$i]) && checkInt($_POST['shield'][$i])) {
      $sqlCmd="UPDATE player.item_attr_rare
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
$sqlCmd = "SELECT * FROM player.item_attr_rare";
$sqlQry = mysql_query($sqlCmd,$sqlServ); 
?>
<p>In aceast&#259; pagin&#259; pute&#355;i edita bonusurile din tabela item_attr_rare. Acesta con&#355;ine datele bonusurilor. <br/> <b> Datele sunt foarte sensibile, modifica&#355;ile cu mare aten&#355;ie!</b></p>
<form action="index.php?s=admin&a=item_attr_rare" method="POST">
  <table class="small">
    <tr>
      <th class="topLine">aplic&#259;</th>
      <th class="topLine">prob</th>
      <th class="topLine">lv1</th>
      <th class="topLine">lv2</th>
      <th class="topLine">lv3</th>
      <th class="topLine">lv4</th>
      <th class="topLine">lv5</th>
      <th class="topLine">arm&#259;</th>
      <th class="topLine">armur&#259;</th>
      <th class="topLine">bra&#355;ar&#259;</th>
      <th class="topLine">papuci</th>
      <th class="topLine">colier</th>
      <th class="topLine">coif</th>
      <th class="topLine">scut</th>
      <th class="topLine">cercei</th>
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
      <td colspan="15" class="topLine" style="text-align:center;"><input type="submit" name="submit" value="Actualizare" /> &bull; <input type="reset" value="Reseteaz&#259;" /></td>
    </tr>
  </table>
</form>
<?PHP
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>