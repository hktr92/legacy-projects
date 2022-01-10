<?PHP
  if($_SESSION['user_admin']>=$adminRights['game_admins']) {
?>
<h2>Administrare - editare admini jocului</h2>
<?PHP

  // IPs aktualisieren
  if(isset($_POST['ips']) && $_POST['ips']=="Actualizare") {
    $anzIPs = count($_POST['ipalt']);
    for($i=0;$i<$anzIPs;$i++) {
      if(checkIP($_POST['ipaddr'][$i]) && checkIP($_POST['ipalt'][$i])) {
        $sqlIp = "UPDATE common.gmhost SET mIP='".mysql_real_escape_string($_POST['ipaddr'][$i])."' WHERE mIP='".mysql_real_escape_string($_POST['ipalt'][$i])."' LIMIT 1;";
        $qryIp = mysql_query($sqlIp,$sqlServ);
      }
    }
    
    if(is_array($_POST['delip'])) {
      foreach($_POST['delip'] AS $delID) {
        $cmdDelete = "DELETE FROM common.gmhost WHERE mIP='".$delID."' LIMIT 1";
        $qryDelete = mysql_query($cmdDelete,$sqlServ);
      }
    }
    
    echo'<p class="meldung">IP-ul a fost updatat cu succes.</p>';
  }

  // IP hinzuf&uuml;gen
  if(isset($_POST['addip']) && $_POST['addip']=="Adauga") {
    if(checkIP($_POST['ip'])) {
      $sqlIp = "INSERT INTO common.gmhost VALUES ('".mysql_real_escape_string($_POST['ip'])."');";
      $qryIp = mysql_query($sqlIp,$sqlServ);
      if($qryIp) {
        echo'<p class="meldung">Ip-ul a fost ad&#259;ugat cu succes.</p>';
      }
      else { echo'<p class="meldung">Adaugarea IP-ului a e&#351;uat.</p>'; }
    }
  }

  // Admins aktualisieren
  if(isset($_POST['admins']) && $_POST['admins']=="Actualizare") {
    $anzAdmins = count($_POST['mID']);
    for($i=0;$i<$anzAdmins;$i++) {
      if(checkInt($_POST['mID'][$i]) && !empty($_POST['account'][$i]) && !empty($_POST['charakter'][$i]) && checkIP($_POST['adminip'][$i]) && !empty($_POST['rechte'][$i])) {
        $sqlAdmins="UPDATE common.gmlist SET mAccount='".mysql_real_escape_string($_POST['account'][$i])."',mName='".mysql_real_escape_string($_POST['charakter'][$i])."',mContactIp='".mysql_real_escape_string($_POST['adminip'][$i])."',mAuthority='".mysql_real_escape_string($_POST['rechte'][$i])."' WHERE mID='".$_POST['mID'][$i]."' LIMIT 1;";
        $qryAdmins=mysql_query($sqlAdmins,$sqlServ);
      }
    }
    
    if(is_array($_POST['del'])) {
      foreach($_POST['del'] AS $delID) {
        $cmdDelete = "DELETE FROM common.gmlist WHERE mID='".$delID."' LIMIT 1";
        $qryDelete = mysql_query($cmdDelete,$sqlServ);
      }
    }
    
    echo'<p class="meldung">Admini au fost updata&#355;i cu succes.</p>';
  }
  
  // Admin hinzufügen
  if(isset($_POST['add']) && $_POST['add']=="Adauga") {
    if(!empty($_POST['account']) && !empty($_POST['charakter']) && checkIP($_POST['ip']) && !empty($_POST['rechte'])) {
      $sqlIns = "INSERT INTO common.gmlist VALUES (NULL,'".mysql_real_escape_string($_POST['account'])."','".mysql_real_escape_string($_POST['charakter'])."','".$_POST['ip']."','ALL','".mysql_real_escape_string($_POST['rechte'])."');";
      $qryIns = mysql_query($sqlIns,$sqlServ);
      if($qryIns) {
        echo'<p class="meldung">Adminul a fost ad&#259;ugat cu succes.</p>';
      }
      else {
        echo'<p class="meldung">Adaugarea adminului a e&#351;uat.</p>';
      }
    
    }
    else {
      echo'<p class="meldung">Nu ati introdus toate datele corect. V&#259;rugam re&#226;ncerca&#355;i.</p>';
    }
  }
?>
<div class="splitLeft">
  <h3>Lista IP-urilor</h3>
  <form action="index.php?s=admin&a=gadmins" method="POST">
    <table>
      <tr>
        <td>
          <div class="ipListBox">
            <table>
              <tr>
                <th class="topLine">Lista IP-urilor</th>
                <th class="topLine">&#350;tergere</th>
              </tr>
            <?PHP
              $sqlIps = "SELECT mIP FROM common.gmhost";
              $resIps = mysql_query($sqlIps,$sqlServ);
              
              $x=0;
              while($getIps = mysql_fetch_object($resIps)) {
                $zS = ($x%2==0) ? "tdunkel" : "thell";
                echo'<tr>
                  <td class="'.$zS.'">
                    <input type="hidden" name="ipalt[]" value="'.$getIps->mIP.'"/>
                    <input type="text" name="ipaddr[]" size="16" maxlength="16" value="'.$getIps->mIP.'"/>
                  </td>
                  <td class="'.$zS.'" style="text-align:center">
                    <input type="checkbox" name="delip[]" value="'.$getIps->mIP.'"/>
                  </td>
                </tr>';
                $x++;
              }
            ?>
            </table>
          </div>
        </td>
      </tr>
      <tr>
        <td class="topLine" style="text-align:center;"><input type="submit" name="ips" value="Actualizare"/></th>
      </tr>
    </table>
  </form>
</div>
<div class="splitRight">
  <h3>Ad&#259;ugare admin</h3>
  <form action="index.php?s=admin&a=gadmins" method="POST">
  <table>
    <tr>
      <th class="topLine">Cont</th>
      <th class="topLine">Caracter</th>
    </tr>
    <tr>
      <td class="tdunkel"><input type="text" name="account" size="10" maxlength="16"/></td>
      <td class="tdunkel"><input type="text" name="charakter" size="10" maxlength="16"/></td>
    </tr>
    <tr>
      <th class="topLine">Adresa IP</th>
      <th class="topLine">Drepturile</th>
    </tr>
    <tr>
      <td class="thell">
        <select name="ip">
        <?PHP  
          $sqlIps = "SELECT mIP FROM common.gmhost";
          $resIps = mysql_query($sqlIps,$sqlServ);
          
          while($getIps = mysql_fetch_object($resIps)) {
            echo'<option value="'.$getIps->mIP.'">'.$getIps->mIP.'</option>';
          }
        ?>  
        </select>
      </td>
      <td class="thell">
        <select name="rechte">
        <?PHP  
        foreach($gmRechte AS $gKey => $gValue) {
          echo'<option value="'.$gValue.'">'.$gKey.'</option>';
        }  
        ?>  
        </select>
      </td>
    </tr>
    <tr>
      <th class="topLine" colspan="2" style="text-align:center;"><input type="submit" name="add" value="Adauga"/></th>
    </tr>
  </table>
  </form>
  <form action="index.php?s=admin&a=gadmins" method="POST">
    <table>
      <tr>
        <th class="topLine" colspan="3">Ad&#259;ugare IP</th>
      </tr>
      <tr>
        <th class="topLine">IP:</th>
        <td class="tdunkel"><input type="text" name="ip" value="" size="16" maxlength="16"/></td>
        <th class="topLine" style="text-align:center;"><input type="submit" name="addip" value="Adauga"/></th>
      </tr>
    </table>
  </form>
</div>
<h3>Admini joc - prezentare general&#259;</h3>
<form action="index.php?s=admin&a=gadmins" method="POST">
  <table>
    <tr>
      <th class="topLine">Cont</th>
      <th class="topLine">Caracter</th>
      <th class="topLine">IP</th>
      <th class="topLine">Drepturi</th>
      <th class="topLine">&#350;tergere</th>
    </tr>
    <?PHP
    
      $sqlCmd="SELECT mID,mAccount,mName,mContactIp,mAuthority FROM common.gmlist";
      $sqlQry=mysql_query($sqlCmd,$sqlServ);
      
      $x=0;
      while($getAdmins=mysql_fetch_object($sqlQry)) {
        $zS = (($x%2)==0) ? "tdunkel" : "thell";
        echo'<input type="hidden" name="mID[]" value="'.$getAdmins->mID.'"/>
        <tr>
          <td class="'.$zS.'">&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="account[]" size="10" maxlength="16" value="'.$getAdmins->mAccount.'" />&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td class="'.$zS.'"><input type="text" name="charakter[]" size="10" maxlength="16" value="'.$getAdmins->mName.'" />&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td class="'.$zS.'">
            <select name="adminip[]">';
        
        $sqlIps = "SELECT mIP FROM common.gmhost";
        $resIps = mysql_query($sqlIps,$sqlServ);
        
        while($getIps = mysql_fetch_object($resIps)) {
          $selected =  ($getIps->mIP==$getAdmins->mContactIp) ? 'selected="selected"' : '';
          echo'<option '.$selected.' value="'.$getIps->mIP.'">'.$getIps->mIP.'</option>';
        }
          
        echo'</select>
        </td>
          <td class="'.$zS.'">
            <select name="rechte[]">';
          
        foreach($gmRechte AS $gKey => $gValue) {
          $selected =  ($gValue==$getAdmins->mAuthority) ? 'selected="selected"' : '';
          echo'<option '.$selected.' value="'.$gValue.'">'.$gKey.'</option>';
        }  
          
        echo'</select>
          </td>
          <td class="'.$zS.'" style="text-align:center;">
            <input type="checkbox" name="del[]" value="'.$getAdmins->mID.'"/>
          </td>
        </tr>';
        $x++;
      }
    
    ?>
    <tr>
      <th class="topLine" style="text-align:center;" colspan="5"><input type="submit" name="admins" value="Actualizare"/></th>
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