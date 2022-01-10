<?PHP
  if($_SESSION['user_admin']>=$adminRights['psc']) {
    $ueberruefen="https://customer.cc.at.paysafecard.com/psccustomer/GetWelcomePanelServlet";
    echo '<h2>Administrare - dona&#355;ii</h2>';
    echo '<p><a href="index.php?s=admin&a=voucher">Cereri deschise</a> &bull; <a href="index.php?s=admin&a=voucher&closed=yes">Cereri completate</a> &bull; <a href="index.php?s=admin&a=voucher_add">Ad&#259;ugare bon</a></p>';
    echo '<table>
            <tr>      
              <th class="topLine">ID</th>
              <th class="topLine">Cont</th>
              <th class="topLine">Admin</th>
              <th class="topLine">Card</th>
              <th class="topLine">Suma</th>
              <th class="topLine">Stare</th>
              <th class="topLine">Data</th>
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
      $pscStatus = ($getPSC->status>=1) ? "<span style=\"color:#06AA03\">&#206;nchis&#259;</span>" : "<span style=\"color:#613802\">Neterminat&#259;</span>";
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
    echo'<p class="meldung">Nu ai acces la aceast&#259; zon&#259;!</p>';
  }
?>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>