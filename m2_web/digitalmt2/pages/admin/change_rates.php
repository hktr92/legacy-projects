<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Rates ändern</h3>
        <div class="big-line"></div>
<?PHP
  if($_SESSION['user_admin']>=$adminRights['db_rates']) {
  echo'<h2>Admin - DB-Rates &auml;ndern</h2>';
    if(isset($_POST['submit']) && $_POST['submit']=="aktualisieren") {
      if(checkRate($_POST['valueMinGold']) && checkRate($_POST['valueMaxGold']) && checkRate($_POST['valueEXP'])) {
        $sqlCmd=array();
        
        // GOLD_MIN WERTE AKTUALISIEREN
        if($_POST['calcMinGold']=="mul") { $cOperator = '*'; $facRate = round($_POST['facMinGold']*$_POST['valueMinGold'],8); }
        else { $cOperator = '/'; $facRate = round($_POST['facMinGold']/$_POST['valueMinGold'],8); }
        $cOperator = ($_POST['calcMinGold']=="mul") ? '*' : '/';
        $sqlCmd[] = "UPDATE player.mob_proto 
        SET gold_min=(
        CASE 
        WHEN (ROUND((gold_min".$cOperator.$_POST['valueMinGold']."),0)<1) THEN '1' 
        ELSE ROUND((gold_min".$cOperator.$_POST['valueMinGold']."),0)
        END
        )";
        //$sqlCmd[] = "UPDATE player.mob_proto SET gold_min=ROUND(gold_min".$cOperator.$_POST['valueMinGold'].",0) WHERE 1";
        $updateHp[] = "UPDATE ".SQL_HP_DB.".server_settings SET value='".$facRate."' WHERE variable='minGoldRate' LIMIT 1";
        
        
        // GOLD_MAX WERTE AKTUALISIEREN
        if($_POST['calcMaxGold']=="mul") { $cOperator = '*'; $facRate = round($_POST['facMaxGold']*$_POST['valueMaxGold'],8); }
        else { $cOperator = '/'; $facRate = round($_POST['facMaxGold']/$_POST['valueMaxGold'],8); }
        $sqlCmd[] = "UPDATE player.mob_proto 
        SET gold_max=(
        CASE 
        WHEN (ROUND((gold_max".$cOperator.$_POST['valueMaxGold']."),0)<1) THEN '1' 
        ELSE ROUND((gold_max".$cOperator.$_POST['valueMaxGold']."),0)
        END
        )";
        //$sqlCmd[] = "UPDATE player.mob_proto SET gold_max=ROUND(gold_min".$cOperator.$_POST['valueMaxGold'].",0) WHERE 1";
        $updateHp[] = "UPDATE ".SQL_HP_DB.".server_settings SET value='".$facRate."' WHERE variable='maxGoldRate' LIMIT 1";
        
        
        // EXP WERTE AKTUALISIEREN
        if($_POST['calcEXP']=="mul") { $cOperator = '*'; $facRate = round($_POST['facEXP']*$_POST['valueEXP'],8); }
        else { $cOperator = '/'; $facRate = round($_POST['facEXP']/$_POST['valueEXP'],8); }
        $sqlCmd[] = "UPDATE player.mob_proto 
        SET exp=(
        CASE 
        WHEN (ROUND((exp".$cOperator.$_POST['valueEXP']."),0)<1) THEN '1' 
        ELSE ROUND((exp".$cOperator.$_POST['valueEXP']."),0)
        END
        )";
        //$sqlCmd[] = "UPDATE player.mob_proto SET exp=ROUND(exp".$cOperator.$_POST['valueEXP'].",0) WHERE 1";
        $updateHp[] = "UPDATE ".SQL_HP_DB.".server_settings SET value='".$facRate."' WHERE variable='expRate' LIMIT 1";
        echo'<p class="meldung">';
        
        $i=0;
        foreach($sqlCmd as $sqlInput) {
          $sqlQry=mysql_query($sqlInput,$sqlServ);
          if($sqlQry) { ++$i; }
          else { echo $sqlInput.' fehlgeschlagen<br/>'; }
        }
        
        foreach($updateHp as $hpInput) {
          $sqlQry=mysql_query($hpInput,$sqlHp);
          if($sqlQry) { ++$i; }
          else { echo $hpInput.' fehlgeschlagen<br/>'; }
        }
        
        echo'<b>Erfolgreiche Queries: '.$i.'</b><br/>Bei erfolgreicher Aktualisierung wurden 6 Queries ausgef&uuml;hrt.</p>';
        unset($sqlCmd);
      }
      else {
        echo'<p class="meldung">Mindestens eine der angegebenen Rates entsprach nicht den Vorgaben</p>';
      }
    }
?>
<p>Hier k&ouml;nnen die DB-Rates ver&auml;ndert werden. Der Faktor in der zweiten Spalte gibt aus, wie der Wert ausgehend von &laquo;1&raquo; ver&auml;ndert wurde, um die Rates wieder auf den Anfangswert zu bringen. <b>Alternativ k&ouml;nnen die Rates auch ingame ver&auml;ndert werden.</b></p>
<form action="index.php?s=admin&a=change_rates" method="POST">
  <table>
    <?PHP
      $sqlCmd="SELECT * FROM ".SQL_HP_DB.".server_settings WHERE variable='minGoldRate' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlHp);
      $getVarData=mysql_fetch_object($sqlQry);
    ?>
    <tr>
      <th class="topLine">Min.-Gold-Rate:</th>
      <td class="thell">Aktueller Faktor: <b><?PHP echo $getVarData->value; ?></b></td>
      <td class="thell">
        <input type="hidden" name="facMinGold" value="<?PHP echo $getVarData->value; ?>"/>
        <select name="calcMinGold">
          <option value="mul">multiplizieren</option>
          <option value="div">dividieren</option>
        </select>
        <input type="text" name="valueMinGold" value="1" maxlength="9" size="9"/></td>
    </tr>
    <?PHP
      $sqlCmd="SELECT * FROM ".SQL_HP_DB.".server_settings WHERE variable='maxGoldRate' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlHp);
      $getVarData=mysql_fetch_object($sqlQry);
    ?>
    <tr>
      <th class="topLine">Max.-Gold-Rate:</th>
      <td class="thell">Aktueller Faktor: <b><?PHP echo $getVarData->value; ?></b></td>
      <td class="thell">
        <input type="hidden" name="facMaxGold" value="<?PHP echo $getVarData->value; ?>"/>
        <select name="calcMaxGold">
          <option value="mul">multiplizieren</option>
          <option value="div">dividieren</option>
        </select>
        <input type="text" name="valueMaxGold" value="1" maxlength="9" size="9"/></td>
    </tr>
    <?PHP
      $sqlCmd="SELECT * FROM ".SQL_HP_DB.".server_settings WHERE variable='expRate' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlHp);
      $getVarData=mysql_fetch_object($sqlQry);
    ?>
    <tr>
      <th class="topLine">EXP-Rate:</th>
      <td class="thell">Aktueller Faktor: <b><?PHP echo $getVarData->value; ?></b></td>
      <td class="thell">
        <input type="hidden" name="facEXP" value="<?PHP echo $getVarData->value; ?>"/>
        <select name="calcEXP">
          <option value="mul">multiplizieren</option>
          <option value="div">dividieren</option>
        </select>
        <input type="text" name="valueEXP" value="1" maxlength="9" size="9"/></td>
    </tr>
    <tr>
      <td class="topLine" style="text-align:center;" colspan="3">
        <input type="submit" name="submit" value="aktualisieren" /> <input type="reset" value="zur&uuml;cksetzen"/>
      </td>
    </tr>
  </table>
</form>

<?PHP
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>    </div>
    <div class="bottom"></div>
</div>