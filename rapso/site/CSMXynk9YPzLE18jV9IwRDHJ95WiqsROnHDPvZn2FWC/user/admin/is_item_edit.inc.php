<?PHP
  if($_SESSION['user_admin']>=$adminRights['is_items']) {
    if(isset($_GET['id']) && checkInt($_GET['id'])) {
      $sqlCmd = "SELECT * FROM ".SQL_HP_DB.".is_items WHERE id='".$_GET['id']."' LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlHp);
      if(mysql_num_rows($sqlQry)==1) {
        $getData = mysql_fetch_object($sqlQry);
?>
<form enctype="multipart/form-data" action="index.php?s=admin&a=is_items" method="POST">
<input type="hidden" name="bildAlt" value="<?PHP echo $getData->bild; ?>"/>
<input type="hidden" name="iid" value="<?PHP echo $_GET['id']; ?>"/>
  <table>
    <tr>
      <th class="topLine">Item / Vnum</th>
      <td class="tdunkel">
          <?PHP listItems($getData->vnum); ?>
          <select name="itemgrad">
            <?PHP
              for($i=0;$i<10;$i++) {
                if($calcStufe==$i) $iSelected='selected="selected"';
                else $iSelected='';
                echo'<option '.$iSelected.' value="'.$i.'">'.$i.'</option>';
              }
            ?>
          </select>
          sau vnum: <input type="text" value="<?PHP if(!($ausgabe=='liste')) echo $getData->vnum; ?>" size=10" maxlength="10" name="vnum" />
      </td>
    </tr>
    <tr>
      <th class="topLine">Categorie</th>
      <td class="tdunkel">
        <select name="kategorie">
          <?PHP
            $sqlCmd="SELECT * FROM ".SQL_HP_DB.".is_kategorien ORDER BY titel ASC";
            $sqlQry=mysql_query($sqlCmd,$sqlHp);
            while($getKats=mysql_fetch_object($sqlQry)) {
              if($getData->kategorie_id==$getKats->id) $kSelected='selected="selected"';
              else $kSelected='';
              echo'<option '.$kSelected.' value="'.$getKats->id.'">'.$getKats->titel.'</option>';
            }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <th class="topLine">Descriere:</th>
      <td class="tdunkel"><input type="text" value="<?PHP echo $getData->beschreibung; ?>" name="beschreibung" maxlength="200" size="25"/></td>
    </tr>
    <tr>
      <th class="topLine">Imagine:</th>
      <td class="tdunkel">
        <?PHP 
          if(!empty($getData->bild)) {
            echo'<p><img src="./is_img/'.$getData->bild.'" title="'.$getData->bild.'" alt="'.$getData->bild.'"/><br/>
            <input type="checkbox" name="loeschen" value="loeschen" />&#351;terge imaginea</p>';
          } 
        ?>
        <input type="file" name="bildupload"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Costuri:</th>
      <td class="tdunkel"><input type="text" value="<?PHP echo $getData->preis; ?>" name="preis" maxlength="10" size="10"/> Coins</td>
    </tr>
    <tr>
      <th class="topLine">Arat&#259;:</th>
      <td class="tdunkel">
        <select name="anzeigen">
          <option <?PHP if($getData->anzeigen=='J') echo 'selected="selected"'; ?> value="J">Da</option>
          <option <?PHP if($getData->anzeigen=='N') echo 'selected="selected"'; ?> value="N">Nu</option>
        </select>
      </td>
    </tr>
    <tr>
      <td class="thell" style="text-align:center;" colspan="2">Urm&#259;toarele valori vor trebui setate cu grij&#259;.</td>
    </tr>
    <tr>
      <th class="topLine">Slot #1:</th>
      <td class="thell">
        <input type="text" size="10" value="<?PHP echo $getData->socket0; ?>" maxlength="10" name="socket0">
      </td>
    </tr>
    <tr>
      <th class="topLine">Slot #2:</th>
      <td class="tdunkel">
        <input type="text" size="10" value="<?PHP echo $getData->socket1; ?>" maxlength="10" name="socket1">
      </td>
    </tr>
    <tr>
      <th class="topLine">Slot #3:</th>
      <td class="thell">
        <input type="text" size="10" value="<?PHP echo $getData->socket2; ?>" maxlength="10" name="socket2">
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Value) #1:</th>
      <td class="tdunkel">
        <input type="text" size="4" value="<?PHP echo $getData->attrtype0; ?>" maxlength="4" name="boni0">
        <input type="text" name="boniv0" value="<?PHP echo $getData->attrvalue0; ?>" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Value) #2:</th>
      <td class="thell">
        <input type="text" size="4" value="<?PHP echo $getData->attrtype1; ?>" maxlength="4" name="boni1">
        <input type="text" name="boniv1" value="<?PHP echo $getData->attrvalue1; ?>" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Value) #3:</th>
      <td class="tdunkel">
        <input type="text" size="4" value="<?PHP echo $getData->attrtype2; ?>" maxlength="4" name="boni2">
        <input type="text" name="boniv2" value="<?PHP echo $getData->attrvalue2; ?>" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Value) #4:</th>
      <td class="thell">
        <input type="text" size="4" value="<?PHP echo $getData->attrtype3; ?>" maxlength="4" name="boni3">
        <input type="text" name="boniv3" value="<?PHP echo $getData->attrvalue3; ?>" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Value) #5:</th>
      <td class="tdunkel">
        <input type="text" size="4" value="<?PHP echo $getData->attrtype4; ?>" maxlength="4" name="boni4">
        <input type="text" name="boniv4" value="<?PHP echo $getData->attrvalue4; ?>" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Value) #6:</th>
      <td class="thell">
        <input type="text" size="4" value="<?PHP echo $getData->attrtype5; ?>" maxlength="4" name="boni5">
        <input type="text" name="boniv5" value="<?PHP echo $getData->attrvalue5; ?>" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Value) #7:</th>
      <td class="tdunkel">
        <input type="text" size="4" value="<?PHP echo $getData->attrtype6; ?>" maxlength="4" name="boni6">
        <input type="text" name="boniv6" value="<?PHP echo $getData->attrvalue6; ?>" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine" colspan="2" style="text-align:center;"><input type="submit" name="submit" value="Editeaza"/> &bull; <input type="reset" value="Reseteaz&#259;"/></th>
    </tr>
  </table>
</form>
<?PHP
      }
      else { echo'<p class="meldung">ID-ul introdus nu exista!<p>'; }
    }
    else { echo'<p class="meldung">ID-ul nu este valid!<p>'; }
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?>
