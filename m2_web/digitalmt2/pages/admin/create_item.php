<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Items erstellen</h3>
        <div class="big-line"></div>
<?PHP
  if($_SESSION['user_admin']>=$adminRights['itemerstellung']) {
?>
<h2>Admin - Item erstellen</h2>
<?PHP
  
    if(isset($_POST['submit']) && $_POST['submit']=="erstellen") {
    
      if(checkInt($_POST['aid'])) {
        $sqlCmd = "SELECT COUNT(*) AS checkIn FROM account.account WHERE id='".$_POST['aid']."' LIMIT 1";
        $getCount = mysql_fetch_object(mysql_query($sqlCmd,$sqlServ));
        if($getCount->checkIn==1) {
          
          if(!empty($_POST['window']) && checkInt($_POST['position']) && !empty($_POST['itemtyp']) && checkInt($_POST['stufe']) && checkInt($_POST['stapelmenge'])) {
            if(!empty($_POST['vnum']) && checkInt($_POST['vnum'])) {
              $avnum=$_POST['vnum'];
            }
            else {
              if($_POST['itemtyp']>=11971 && $_POST['itemtyp']<=11974) {
                $_POST['stufe']=0;
              }
              $avnum=$_POST['itemtyp']+$_POST['stufe'];
            }
            $sqlCmd="INSERT INTO player.item 
              (owner_id,window,pos,count,vnum,socket0,socket1,socket2,attrtype0,attrvalue0,attrtype1,attrvalue1,attrtype2,attrvalue2,attrtype3,attrvalue3,attrtype4,attrvalue4,attrtype5,attrvalue5,attrtype6,attrvalue6)
              VALUES
              ('".$_POST['aid']."','".$_POST['window']."','".$_POST['position']."','".$_POST['stapelmenge']."','".$avnum."','".$_POST['socket0']."','".$_POST['socket1']."','".$_POST['socket2']."','".$_POST['boni0']."','".$_POST['boniv0']."','".$_POST['boni1']."','".$_POST['boniv1']."','".$_POST['boni2']."','".$_POST['boniv2']."','".$_POST['boni3']."','".$_POST['boniv3']."','".$_POST['boni4']."','".$_POST['boniv4']."','".$_POST['boni5']."','".$_POST['boniv5']."','".$_POST['boni6']."','".$_POST['boniv6']."')";
            $sqlQry = mysql_query($sqlCmd,$sqlServ) or die(mysql_error());
            if($sqlQry) {
              echo'<p class="meldung">Das Item wurde erfolgreich eingetragen.</p>';
            }
          }
          else { echo'<p class="meldung">Erstellen fehlgeschlagen. Sie haben falsche Daten eingegeben.</p>'; }          
        }
        else { echo'<p class="meldung">Keine vorhandene Account-ID.</p>'; }
      }
      else { echo'<p class="meldung">Keine valide Account-ID.</p>'; }
    
    }
  
  
  
?>
<form action="index.php?s=admin&a=create_item" method="POST">
  <table style="width: 100%;">
    <tr>
      <th class="topLine">Für AccountID:</th>
      <td class="tdunkel"><input type="text" name="aid" size="11" value="<?PHP echo $_GET['acc']; ?>" maxlength="11"/></td>
    </tr>
    <tr>
      <th class="topLine">Ort</th>
      <td class="thell">
        <select name="window">
          <option value="SAFEBOX">Lager</option>
          <option value="MALL">IS-Lager</option>
          <!-- <option value="INVENTORY">Inventar</option> -->
        </select>
      </td>
    </tr>
    <tr>
      <th class="topLine">Position (Max. 44)</th>
      <td class="tdunkel"><input name="position" type="text" size="20" value="0" maxlength="20"/></td>
    </tr>
    <tr>
      <th class="topLine">Item:</th>
      <td class="thell">
          <?PHP
            listItems();
          ?>
        <select name="stufe">
          <?PHP 
            for($i=0;$i<10;$i++) {
            
              echo "<option value=\"$i\">+$i</option>";
            
            }
          ?>
        </select>
        oder vnum 
        <input type="text" name="vnum" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Menge (bei stapelbaren Items):</th>
      <td class="tdunkel"><input type="text" name="stapelmenge" size="20" maxlength="20" value="1"/></td>
    </tr>
    <tr>
      <th class="topLine">Stein #1:</th>
      <td class="thell">
        <select name="socket0">
          <?PHP
            foreach($itemSteine AS $aKey => $aValue) {
              echo'<option value="'.$aKey.'">'.$aValue.'</option>';
            }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <th class="topLine">Stein #2:</th>
      <td class="tdunkel">
        <select name="socket1">
          <?PHP
            foreach($itemSteine AS $aKey => $aValue) {
              echo'<option value="'.$aKey.'">'.$aValue.'</option>';
            }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <th class="topLine">Stein #3:</th>
      <td class="thell">
        <select name="socket2">
          <?PHP
            foreach($itemSteine AS $aKey => $aValue) {
              echo'<option value="'.$aKey.'">'.$aValue.'</option>';
            }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #1:</th>
      <td class="tdunkel">
        <select name="boni0">
          <?PHP
            foreach($itemBoni AS $aKey => $aValue) {
              echo'<option value="'.$aKey.'">'.$aValue.'</option>';
            }
          ?>
        </select>
        <input type="text" name="boniv0" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #2:</th>
      <td class="thell">
        <select name="boni1">
          <?PHP
            foreach($itemBoni AS $aKey => $aValue) {
              echo'<option value="'.$aKey.'">'.$aValue.'</option>';
            }
          ?>
        </select>
        <input type="text" name="boniv1" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #3:</th>
      <td class="tdunkel">
        <select name="boni2">
          <?PHP
            foreach($itemBoni AS $aKey => $aValue) {
              echo'<option value="'.$aKey.'">'.$aValue.'</option>';
            }
          ?>
        </select>
        <input type="text" name="boniv2" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #4:</th>
      <td class="thell">
        <select name="boni3">
          <?PHP
            foreach($itemBoni AS $aKey => $aValue) {
              echo'<option value="'.$aKey.'">'.$aValue.'</option>';
            }
          ?>
        </select>
        <input type="text" name="boniv3" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #5:</th>
      <td class="tdunkel">
        <select name="boni4">
          <?PHP
            foreach($itemBoni AS $aKey => $aValue) {
              echo'<option value="'.$aKey.'">'.$aValue.'</option>';
            }
          ?>
        </select>
        <input type="text" name="boniv4" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #6:</th>
      <td class="thell">
        <select name="boni5">
          <?PHP
            foreach($itemBoni AS $aKey => $aValue) {
              echo'<option value="'.$aKey.'">'.$aValue.'</option>';
            }
          ?>
        </select>
        <input type="text" name="boniv5" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #7:</th>
      <td class="tdunkel">
        <select name="boni6">
          <?PHP
            foreach($itemBoni AS $aKey => $aValue) {
              echo'<option value="'.$aKey.'">'.$aValue.'</option>';
            }
          ?>
        </select>
        <input type="text" name="boniv6" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine" colspan="2" style="text-align:center;"><input type="submit" value="erstellen" name="submit"/> <input type="reset" value="reset"/></th>
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