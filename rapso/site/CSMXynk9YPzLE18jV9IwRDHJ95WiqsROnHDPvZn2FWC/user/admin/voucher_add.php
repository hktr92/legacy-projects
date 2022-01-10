<?PHP
  if($_SESSION['user_admin']>=$adminRights['psc']) {
    echo'<h2>Administrare - dona&#355;ii</h2>';
    if(isset($_POST['submit']) && $_POST['submit']=="Add") {
    
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
        if($sqlQry) { echo'<p class="meldung">Cardul a fost ad&#259;ugat cu succes.</p>'; }
      }
      else {
      
        echo'<p class="meldung">Cardul nu a putut fi ad&#259;ugat. Intr&#259;rile nu au fost corecte.</p>';
      
      }
    
    }
?>

        <p><a href="index.php?s=admin&a=voucher">&#206;napoi la list&#259;</a></p>
        <h3>Ad&#259;ugare card</h3>
        <div class="user">
          <form action="index.php?s=admin&a=voucher_add" method="POST">
            <table>
              <tr>
                <th class="topLine">ID-ul contului:</th>
                <td class="tdunkel"><input type="text" size="16" name="uid" maxlength="16" value="<?PHP if(isset($_GET['acc'])) { echo $_GET['acc']; } ?>"/></td>
              </tr>
              <tr>
                <th class="topLine">Tipul cardului</th>
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
                <th class="topLine">Card:</th>
                <td class="thell"><input type="text" size="25" maxlength="25" name="voucher"/> Suma: 
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
                <th class="topLine">Parola:</th>
                <td class="tdunkel"><input type="text" size="20" maxlength="20" name="voucherpass"/> (gol &#238;nseamn&#259; nimic)</td>
              </tr>
              <tr>
                <th class="topLine">Comentariu (200 caractere):</th>
                <td class="thell">
                  <input type="text" size="60" maxlength="200" name="kommentar"/>
                </td>
              </tr>
              <tr>
                <th class="topLine">&#206;ntrebare timp:</th>
                <td class="tdunkel">
                  <b><?PHP echo $sqlZeit; ?></b>
                </td>
              </tr>
              <tr>
                <th class="topLine">Stare comand&#259;:</th>
                <td class="thell">
                  <select name="pscstatus">
                    <option value="1">&#206;nchis&#259;</option>
                    <option value="0">Neterminat&#259;</option>
                  </select>
                  &nbsp; Dac&#259; ,cardul este procesat lasa&#355;i pe "&#206;nchis&#259;"
                </td>
              </tr>
              <tr>
                <td class="tdunkel" colspan="2"><input type="submit" name="submit" value="Add"/> - <input type="reset"/></td>
              </tr>
            </table>
          </form>
        </div>
        <h4>Cadru: vizualizare credit card</h4>
        <iframe class="pscCheck" src="https://customer.cc.at.paysafecard.com/psccustomer/GetWelcomePanelServlet"></iframe>
        
<?PHP    
  }
  else {
    echo'<p class="meldung">Nu ai acces la aceast&#259; zon&#259;!</p>';
  }
?>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>