			<div class="postui2 text-title">
					<h2>
                   Voucher bearbeiten
                    
                    </h2>
				
				</div>
				<div class="postui2 text-con">
				<div class="con-wrap"><?PHP
  if($_SESSION['user_admin']>=$adminRights['psc']) {
    echo '<h2>Admin - Voucher Datenbank</h2>';
    if(isset($_POST['submit']) && $_POST['submit']=="bearbeiten") {
    
      if(checkVoucher($_POST['voucher']) && checkInt($_POST['pscstatus']) && checkInt($_POST['vid']) && checkInt($_POST['uid']) && checkInt($_POST['betrag']) && $kartenTypen[$_POST['cardTyp']] && $waehrungen[$_POST['waehrung']]) {
        
        if(isset($_POST['addCoins']) && $_POST['addCoins']=='true') {
          $newCoins=0;
          if(checkInt($_POST['coinsBetrag'])) {
            $newCoins=$_POST['coinsBetrag'];
          }
          if(!empty($_POST['coinsEingabe']) && checkInt($_POST['coinsEingabe'])) {
            $newCoins=$_POST['coinsEingabe'];
          }
          
          $sqlUUpdate = "UPDATE account.account SET coins=coins+".$newCoins." WHERE id='".$_POST['uid']."' LIMIT 1";
          //echo $sqlUUpdate;
          $qryUUpdate = mysql_query($sqlUUpdate,$sqlServ);
          if($qryUUpdate) {
            echo'<p class="meldung">Coins wurden dem Account gutgeschrieben</p>';
          }
        }
        
        $cardVoucher = mysql_real_escape_string($_POST['voucher']);
        $cardBetrag = mysql_real_escape_string($_POST['betrag']);
        $cardWaehrung = mysql_real_escape_string($_POST['waehrung']);
        $cardTyp = mysql_real_escape_string($_POST['cardTyp']);
        $cardPasswort = mysql_real_escape_string($_POST['voucherpass']);
        $kommentar = mysql_real_escape_string($_POST['kommentar']);
        $card_status = mysql_real_escape_string($_POST['pscstatus']);
        
        $sqlCmd = "UPDATE ".SQL_HP_DB.".psc_log SET card_type='".$cardTyp."',waehrung='".$cardWaehrung."',psc_code='".$cardVoucher."', psc_pass='".$cardPasswort."', psc_betrag='".$cardBetrag."', status='".$card_status."', kommentar='".$kommentar."', admin_id='".$_SESSION['user_id']."' WHERE id='".$_POST['vid']."' LIMIT 1";
        
        $sqlQry = mysql_query($sqlCmd,$sqlHp);
        if($sqlQry) { echo'<p class="meldung">Voucher-Eintrag erfolgreich aktualisiert</p>'; }
      }
      else {
      
        echo'<p class="meldung">Daten konnten nicht aktualisiert werden. Nicht alle Felder wurden ordnungsgem&auml;ß ausgef&uuml;llt.</p>';
      
      }
    
    }
  
    echo '<p><a href="index.php?s=admin&a=voucher">zur&uuml;ck zur &Uuml;bersicht</a></p>';
    if(isset($_GET['id']) && !empty($_GET['id'])) 
    {
      $sqlCmd = "SELECT * 
      FROM ".SQL_HP_DB.".psc_log 
      WHERE psc_log.id='".$_GET['id']."' LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlHp);
      if(mysql_num_rows($sqlQry)>0) 
      {
        $pscData = mysql_fetch_object($sqlQry);
        echo'<h3>Voucher bearbeiten</h3>';
        ?>
        
        <div class="user">
          <form action="index.php?s=admin&a=voucher_edit&id=<?PHP echo htmlspecialchars($pscData->id); ?>" method="POST">
            <input type="hidden" name="vid" value="<?PHP echo htmlspecialchars($pscData->id); ?>" />
            <input type="hidden" name="uid" value="<?PHP echo htmlspecialchars($pscData->account_id); ?>" />
            <table>
              <tr>
                <th class="topLine">User:</th>
                <td class="tdunkel"><a href="index.php?s=admin&a=users&acc=<?PHP echo htmlspecialchars($pscData->account_id); ?>"><?PHP echo htmlspecialchars($pscData->account_id); ?></a></td>
              </tr>
              <tr>
                <th class="topLine">Voucher-Typ</th>
                <td class="thell">
                <select name="cardTyp">
                  <?PHP
                  
                  foreach($kartenTypen as $ct => $cto) {
                    $selected = ($ct==htmlspecialchars($pscData->card_type)) ? "selected=\"selected\"" : "";
                    echo'<option '.$selected.' value="'.$ct.'">'.$cto.'</option>';
                  }
                  
                  ?>
                </select>
              </tr>
              <tr>
                <th class="topLine">Voucher:</th>
                <td class="thell">
                  <input type="text" size="25" maxlength="25" value="<?PHP echo htmlspecialchars($pscData->psc_code); ?>" name="voucher"/> Betrag: 
                  <select name="betrag">
                    <?PHP
                    
                    foreach($pscBetraege as $pscs) {
                      echo'<option value="'.$pscs.'"';
                      if($pscs==htmlspecialchars($pscData->psc_betrag)) { echo 'selected="selected"'; }
                      echo'>'.$pscs.'</option>';
                    }
                    
                    ?>
                  </select>
                  &nbsp;
                  <select name="waehrung">
                    <?PHP
                    
                    foreach($waehrungen as $wsh => $wname) {
                      $selected = ($wsh==htmlspecialchars($pscData->waehrung)) ? "selected=\"selected\"" : "";
                      echo'<option '.$selected.' value="'.$wsh.'">'.$wname.'</option>';
                    }
                    
                    ?>
                  </select>
                  <?PHP
                    $psc1 = substr($pscData->psc_code,0,4);
                    $psc2 = substr($pscData->psc_code,4,4);
                    $psc3 = substr($pscData->psc_code,8,4);
                    $psc4 = substr($pscData->psc_code,12);
                    echo '<p>Formatiert: '.$psc1.'-'.$psc2.'-'.$psc3.'-'.$psc4.'</p>';
                  ?>
                  
                </td>
              </tr>
              <tr>
                <th class="topLine">Passwort:</th>
                <td class="tdunkel"><input type="text" size="20" maxlength="20" name="voucherpass" value="<?PHP echo htmlspecialchars($pscData->psc_pass); ?>"/> (leer bedeutet keins)</td>
              </tr>
              <tr>
                <th class="topLine">Kommentar (200 Zeichen):</th>
                <td class="thell">
                  <input type="text" size="40" maxlength="200" name="kommentar" value="<?PHP echo htmlspecialchars($pscData->kommentar); ?>"/>
                </td>
              </tr>
              <tr>
                <th class="topLine">Anfragezeitpunkt:</th>
                <td class="tdunkel">
                  <b><?PHP echo htmlspecialchars($pscData->datum); ?></b>
                </td>
              </tr>
              <tr>
                <th class="topLine">Anfragestatus:</th>
                <td class="thell">
                  <select name="pscstatus">
                    <option value="0" <?PHP if(htmlspecialchars($pscData->status)==0) echo "selected=\"selected\""; ?>>offen</option>
                    <option value="1" <?PHP if(htmlspecialchars($pscData->status)>0) echo "selected=\"selected\""; ?>>geschlossen</option>
                  </select>
                  &nbsp;Wenn der Voucher abgearbeitet ist auf "geschlossen" stellen.
                </td>
              </tr>
              <tr>
                <th class="topLine">Coins gutschreiben?</th>
                <td class="tdunkel">
                  <input type="checkbox" name="addCoins" value="true"/> Haken setzen und Betrag ausw&auml;hlen/eingeben um Coins gutzuschreiben.<br/>
                  
                  <select name="coinsBetrag">
                    <?PHP
                      foreach($coinsBetraege AS $eurBetrag => $coinsB) {
                        $selected = ($eurBetrag==$pscData->psc_betrag && $pscData->waehrung=='EUR') ? "selected=\"selected\"" : "";
                        echo'<option '.$selected.' value="'.$coinsB.'">'.number_format($coinsB,0,',','.').'</option>';
                      }
                      if(!($pscData->waehrung=='EUR')) {
                        echo '<option selected="selected" value="0">Achtung: '.$pscData->waehrung.'!</option>';
                      }
                    ?>
                  </select>
                  &nbsp;oder Eingabe&nbsp;
                  <input type="text" size="10" maxlength="10" name="coinsEingabe"/>
                </td>
              </tr>
              <tr>
                <td class="topLine" style="text-align:center;" colspan="2"><input type="submit" name="submit" value="bearbeiten"/> - <input type="reset" value="reset"/></td>
              </tr>
            </table>
          </form>
        </div>
        <h4>Frame: PSC &uuml;berpr&uuml;fen</h4>
        <iframe class="pscCheck"  width="98%" height="350px"src="https://customer.cc.at.paysafecard.com/psccustomer/GetWelcomePanelServlet"></iframe><br><br>
			<p>Euro</p>
	<table width="168" border="0" align="center">
  <tr>
    <td width="84" class="topLine">10 Euro</td>
    <td width="74" class="tdunkel">40.000.000 Coins</td>
  </tr>
  <tr>
    <td class="topLine">25 Euro</td>
    <td class="tdunkel">100.000.000 Coins</td>
  </tr>
  <tr>
    <td class="topLine">50 Euro</td>
    <td class="tdunkel">200.000.000 Coins</td>
  </tr>
  <tr>
    <td class="topLine">100 Euro</td>
    <td class="tdunkel">400.000.000 Coins</td>
  <tr>
</table>
	<p>Schweizer Franken</p>
	<table width="168" border="0" align="center">
  <tr>
    <td width="84" class="topLine">25 CHF</td>
    <td width="74" class="tdunkel">70.000.000 Coins</td>
  </tr>
  <tr>
    <td class="topLine">75 CHF</td>
    <td class="tdunkel">230.000.000 Coins</td>
  </tr>
  <tr>
    <td class="topLine">150 CHF</td>
    <td class="tdunkel">470.000.000 Coins</td>
  </tr>
</table>
        <?PHP
        
      }
      else
      {
        echo'<p>Die eingegebene PSC-ID existiert nicht!</p>';      
      }
    }
    else 
    {
      echo'<p class="meldung">Es wurde keine PSC-ID eingegeben.</p>';
    }
    
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>				</div>

  </div> 
				<div class="postui2 text-end">
             
                
                  
    </div>