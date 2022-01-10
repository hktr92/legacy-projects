<?PHP
  if($_SESSION['user_admin']>=$adminRights['db_rates']) {
  echo'<h2>Administrare - Schimba&#355;i ratele din baza de date</h2>';
    if(isset($_POST['submit']) && $_POST['submit']=="Schimba") {
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
          else { echo $sqlInput.' e&#351;uat&#259;<br/>'; }
        }
        
        foreach($updateHp as $hpInput) {
          $sqlQry=mysql_query($hpInput,$sqlHp);
          if($sqlQry) { ++$i; }
          else { echo $hpInput.' e&#351;uat&#259;<br/>'; }
        }
        
        echo'<b>Comenzi executate cu succes: '.$i.'</b><br/></p>';
        unset($sqlCmd);
      }
      else {
        echo'<p class="meldung">Cel pu&#355;in una dintre rate nu a &#238;ndeplinit cerin&#355;ele specificate.</p>';
      }
    }
?>
<p>Aici pute&#355;i schimba ratele bazei de date la ratele ini&#355;iale sau pute&#355;i modifica cu ratele proprii dup&#259; plac. Factorul din a doua coloan&#259; indic&#259; modul în care valoarea a fost schimbat&#259; &#238;ncepand de la "1" &#238;napoi pe valoarea ini&#355;ial&#259;. <br/>
<b> Pute&#355;i schimba ratele si din joc folosind comenzile de admin.</b></p>
<form action="index.php?s=admin&a=change_rates" method="POST">
  <table>
    <?PHP
      $sqlCmd="SELECT * FROM ".SQL_HP_DB.".server_settings WHERE variable='minGoldRate' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlHp);
      $getVarData=mysql_fetch_object($sqlQry);
    ?>
    <tr>
      <th class="topLine">Minimul ratei de yang:</th>
      <td class="thell">Factor curent: <b><?PHP echo $getVarData->value; ?></b></td>
      <td class="thell">
        <input type="hidden" name="facMinGold" value="<?PHP echo $getVarData->value; ?>"/>
        <select name="calcMinGold">
          <option value="mul">multiplic&#259;</option>
          <option value="div">&#238;mp&#259;r&#355;e&#351;te</option>
        </select>
        <input type="text" name="valueMinGold" value="1" maxlength="9" size="9"/> 
        Factor &#238;nmul&#355;it sau &#238;mpar&#355;it / ("1" &#238;nseamna la fel)      </td>
    </tr>
    <?PHP
      $sqlCmd="SELECT * FROM ".SQL_HP_DB.".server_settings WHERE variable='maxGoldRate' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlHp);
      $getVarData=mysql_fetch_object($sqlQry);
    ?>
    <tr>
      <th class="topLine">Maximul ratei de yang:</th>
      <td class="thell">Factor curent: <b><?PHP echo $getVarData->value; ?></b></td>
      <td class="thell">
        <input type="hidden" name="facMaxGold" value="<?PHP echo $getVarData->value; ?>"/>
        <select name="calcMaxGold">
          <option value="mul">multiplic&#259;</option>
          <option value="div">&#238;mp&#259;r&#355;e&#351;te</option>
        </select>
        <input type="text" name="valueMaxGold" value="1" maxlength="9" size="9"/> 
        Factor &#238;nmultit sau &#238;mp&#259;r&#355;it / ("1" &#238;nseamna la fel)      </td>
    </tr>
    <?PHP
      $sqlCmd="SELECT * FROM ".SQL_HP_DB.".server_settings WHERE variable='expRate' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlHp);
      $getVarData=mysql_fetch_object($sqlQry);
    ?>
    <tr>
      <th class="topLine">Rata de experien&#355;&#259;:</th>
      <td class="thell">Factor curent: <b><?PHP echo $getVarData->value; ?></b></td>
      <td class="thell">
        <input type="hidden" name="facEXP" value="<?PHP echo $getVarData->value; ?>"/>
        <select name="calcEXP">
          <option value="mul">multiplic&#259;</option>
          <option value="div">&#238;mpar&#355;este</option>
        </select>
        <input type="text" name="valueEXP" value="1" maxlength="9" size="9"/> 
      Factor &#238;nmul&#355;it sau &#238;mpar&#355;it / ("1" &#238;nseamna la fel)      </td>
    </tr>
    <tr>
      <td class="topLine" style="text-align:center;" colspan="3">
        <input type="submit" name="submit" value="Schimba" /> &bull; <input type="reset" value="Reseteaz&#259;"/>      </td>
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