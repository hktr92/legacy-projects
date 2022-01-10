<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Voucher Datenbank</h3>
        <div class="big-line"></div>
<?PHP
  if($_SESSION['user_admin']>=$adminRights['psc']) {
    $ueberruefen="https://customer.cc.at.paysafecard.com/psccustomer/GetWelcomePanelServlet";
  
    echo '<p><a href="index.php?s=admin&a=voucher">Offene Anfragen</a> &bull; <a href="index.php?s=admin&a=voucher&closed=yes">Abgeschlossene Anfragen</a> &bull; <a href="index.php?s=admin&a=voucher_add">Voucher eintragen</a></p>';
    echo '<table style="width: 100%;">
            <tr>      
              <th class="topLine">ID</th>
              <th class="topLine">Account</th>
              <th class="topLine">Admin</th>
              <th class="topLine">Voucher</th>
              <th class="topLine">Betrag</th>
              <th class="topLine">Status</th>
              <th class="topLine">Datum</th>
            </tr>';
            
    if(isset($_GET['closed']) && $_GET['closed']=="yes") {
      $sqlCmd="SELECT * 
      FROM ".SQL_HP_DB.".psc_log
      WHERE psc_log.status>=1
      ORDER BY psc_log.datum DESC";
    }
    else {
      $sqlCmd="SELECT * 
      FROM ".SQL_HP_DB.".psc_log
      WHERE psc_log.status=0
      ORDER BY psc_log.datum DESC";
    }        
    $sqlQry=mysql_query($sqlCmd,$sqlHp);
    $x=0;
    while($getPSC = mysql_fetch_object($sqlQry)) {
      $zF = ($x%2) ? "tdunkel" : "thell";
      $pscStatus = ($getPSC->status>=1) ? "<span style=\"color:#06AA03\">Geschlossen</span>" : "<span style=\"color:#613802\">Offen</span>";
      echo '<tr>
              <td class="'.$zF.'"><a href="index.php?s=admin&a=voucher_edit&id='.$getPSC->id.'">'.$getPSC->id.'</a></td>
              <td class="'.$zF.'"><a href="index.php?s=admin&a=users&acc='.$getPSC->account_id.'">'.$getPSC->account_id.'</td>
              <td class="'.$zF.'">'.htmlspecialchars($getPSC->admin_id).'</td>
              <td class="'.$zF.'">('.$getPSC->card_type.') ';
              echo htmlspecialchars(substr($getPSC->psc_code,0,16));
              if(strlen($getPSC->psc_code)>16) echo'...';
              echo'</td>
              <td class="'.$zF.'">'.htmlspecialchars($getPSC->psc_betrag).' '.$getPSC->waehrung.'</td>
              <td class="'.$zF.'">'.$pscStatus.'</td>
              <td class="'.$zF.'">'.htmlspecialchars($getPSC->datum).'</td>
            </tr>';
      $x++;
    
    }
    echo '</table>';
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>    </div>
    <div class="bottom"></div>
</div>