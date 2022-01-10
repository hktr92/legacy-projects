<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Voucher hinzufügen</h3>
        <div class="big-line"></div><?PHP
  if($_SESSION['user_admin']>=$adminRights['psc']) {
   
    if(isset($_POST['submit']) && $_POST['submit']=="eintragen") {
    
      if(checkVoucher($_POST['voucher']) && checkInt($_POST['pscstatus']) && checkInt($_POST['uid']) && checkInt($_POST['betrag']) && $kartenTypen[$_POST['cardTyp']] && $waehrungen[$_POST['waehrung']]) {
        
        $cardVoucher = mysql_real_escape_string($_POST['voucher']);
        $cardBetrag = mysql_real_escape_string($_POST['betrag']);
        $cardWaehrung = mysql_real_escape_string($_POST['waehrung']);
        $cardTyp = mysql_real_escape_string($_POST['cardTyp']);
        $cardPasswort = mysql_real_escape_string($_POST['voucherpass']);
        $kommentar = mysql_real_escape_string($_POST['kommentar']);
        $card_status = mysql_real_escape_string($_POST['pscstatus']);
        $account = mysql_real_escape_string($_POST['uid']);
        
        $sqlCmd = sprintf("INSERT INTO ".SQL_HP_DB.".psc_log (account_id,admin_id,card_type,waehrung,psc_code,psc_betrag,psc_pass,status,kommentar,datum) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
          $account,
          $_SESSION['user_id'],
          $cardTyp,
          $cardWaehrung,
          $cardVoucher,
          $cardBetrag,
          $cardPasswort,
          $card_status,
          $kommentar,
          $sqlZeit
        );
        
        $sqlQry = mysql_query($sqlCmd,$sqlHp);
        if($sqlQry) { echo'<p class="meldung">Voucher erfolgreich hinzugef&uuml;gt</p>'; }
      }
      else {
      
        echo'<p class="meldung">Voucher konnte nicht eingetragen werden. Die Eingaben waren nicht korrekt.</p>';
      
      }
    
    }
?>

        <p><a href="index.php?s=admin&a=voucher">zur&uuml;ck zur &Uuml;bersicht</a></p>
        <h3>Voucher hinzuf&uuml;gen</h3>
        <div class="user">
          <form action="index.php?s=admin&a=voucher_add" method="POST">
            <table style="width: 100%;">
              <tr>
                <th class="topLine">AccountID:</th>
                <td class="tdunkel"><input type="text" size="16" name="uid" maxlength="16" value="<?PHP if(isset($_GET['acc'])) { echo $_GET['acc']; } ?>"/></td>
              </tr>
              <tr>
                <th class="topLine">Voucher-Typ</th>
                <td class="thell">
                <select name="cardTyp">
                  <?PHP
                  
                  foreach($kartenTypen as $ct => $cto) {
                    echo'<option value="'.$ct.'">'.$cto.'</option>';
                  }
                  
                  ?>
                </select>
              </tr>
              <tr>
                <th class="topLine">Voucher:</th>
                <td class="thell"><input type="text" size="25" maxlength="25" name="voucher"/> Betrag: 
                  <select name="betrag">
                    <?PHP
                    
                    foreach($pscBetraege as $pscs) {
                      echo'<option value="'.$pscs.'">'.$pscs.'</option>';
                    }
                    
                    ?>
                  </select>
                &nbsp;
                <select name="waehrung">
                  <?PHP
                  
                  foreach($waehrungen as $wsh => $wname) {
                    echo'<option value="'.$wsh.'">'.$wname.'</option>';
                  }
                  
                  ?>
                </select>
                </td>
              </tr>
              <tr>
                <th class="topLine">Passwort:</th>
                <td class="tdunkel"><input type="text" size="20" maxlength="20" name="voucherpass"/> (leer bedeutet keins)</td>
              </tr>
              <tr>
                <th class="topLine">Kommentar (200 Zeichen):</th>
                <td class="thell">
                  <input type="text" size="60" maxlength="200" name="kommentar"/>
                </td>
              </tr>
              <tr>
                <th class="topLine">Anfragezeitpunkt:</th>
                <td class="tdunkel">
                  <b><?PHP echo $sqlZeit; ?></b>
                </td>
              </tr>
              <tr>
                <th class="topLine">Anfragestatus:</th>
                <td class="thell">
                  <select name="pscstatus">
                    <option value="1">geschlossen</option>
                    <option value="0">offen</option>
                  </select>
                  &nbsp; Wenn der Voucher abgearbeitet ist auf "geschlossen" stellen.
                </td>
              </tr>
              <tr>
                <td class="tdunkel" colspan="2"><input type="submit" name="submit" value="eintragen"/> <input type="reset"/></td>
              </tr>
            </table>
          </form>
        </div>
        <h4>Frame: PSC überprüfen</h4>
        <iframe style="width: 100%; height: 500px;" class="pscCheck" src="https://customer.cc.at.paysafecard.com/psccustomer/GetWelcomePanelServlet"></iframe>
        
<?PHP    
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>    </div>
    <div class="bottom"></div>
</div>