
			<div class="postui2 text-title">
					<h2>
                    Itemshop - Item bearbeiten                    
                    </h2>
				
				</div>
				<div class="postui2 text-con">
				<div class="con-wrap"><?PHP
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
          oder vnum: <input type="text" value="<?PHP if(!($ausgabe=='liste')) echo $getData->vnum; ?>" size=10" maxlength="10" name="vnum" />
      </td>
    </tr>
    <tr>
      <th class="topLine">Kategorie</th>
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
      <th class="topLine">Beschreibung:</th>
      <td class="tdunkel"><input type="text" value="<?PHP echo $getData->beschreibung; ?>" name="beschreibung" maxlength="200" size="75"/></td>
    </tr>
    <tr>
      <th class="topLine">Bild:</th>
      <td class="tdunkel">
        <?PHP 
          if(!empty($getData->bild)) {
            echo'<p><img src="./is_img/'.$getData->bild.'" title="'.$getData->bild.'" alt="'.$getData->bild.'"/><br/>
            <input type="checkbox" name="loeschen" value="loeschen" /> Bild l&ouml;schen</p>';
          } 
        ?>
        <input type="file" name="bildupload"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Preis:</th>
      <td class="tdunkel"><input type="text" value="<?PHP echo $getData->preis; ?>" name="preis" maxlength="10" size="10"/> Coins</td>
    </tr>
    <tr>
      <th class="topLine">Anzeigen:</th>
      <td class="tdunkel">
        <select name="anzeigen">
          <option <?PHP if($getData->anzeigen=='J') echo 'selected="selected"'; ?> value="J">Ja</option>
          <option <?PHP if($getData->anzeigen=='N') echo 'selected="selected"'; ?> value="N">Nein</option>
        </select>
      </td>
    </tr>
    <tr>
      <td class="thell" style="text-align:center;" colspan="2">Die folgenden Werte sollten mit Vorsicht gesetzt werden.</td>
    </tr>
    <tr>
      <th class="topLine">Socket #1:</th>
      <td class="thell">
        <input type="text" size="10" value="<?PHP echo $getData->socket0; ?>" maxlength="10" name="socket0">
      </td>
    </tr>
    <tr>
      <th class="topLine">Socket #2:</th>
      <td class="tdunkel">
        <input type="text" size="10" value="<?PHP echo $getData->socket1; ?>" maxlength="10" name="socket1">
      </td>
    </tr>
    <tr>
      <th class="topLine">Socket #3:</th>
      <td class="thell">
        <input type="text" size="10" value="<?PHP echo $getData->socket2; ?>" maxlength="10" name="socket2">
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #1:</th>
      <td class="tdunkel">
        <input type="text" size="4" value="<?PHP echo $getData->attrtype0; ?>" maxlength="4" name="boni0">
        <input type="text" name="boniv0" value="<?PHP echo $getData->attrvalue0; ?>" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #2:</th>
      <td class="thell">
        <input type="text" size="4" value="<?PHP echo $getData->attrtype1; ?>" maxlength="4" name="boni1">
        <input type="text" name="boniv1" value="<?PHP echo $getData->attrvalue1; ?>" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #3:</th>
      <td class="tdunkel">
        <input type="text" size="4" value="<?PHP echo $getData->attrtype2; ?>" maxlength="4" name="boni2">
        <input type="text" name="boniv2" value="<?PHP echo $getData->attrvalue2; ?>" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #4:</th>
      <td class="thell">
        <input type="text" size="4" value="<?PHP echo $getData->attrtype3; ?>" maxlength="4" name="boni3">
        <input type="text" name="boniv3" value="<?PHP echo $getData->attrvalue3; ?>" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #5:</th>
      <td class="tdunkel">
        <input type="text" size="4" value="<?PHP echo $getData->attrtype4; ?>" maxlength="4" name="boni4">
        <input type="text" name="boniv4" value="<?PHP echo $getData->attrvalue4; ?>" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #6:</th>
      <td class="thell">
        <input type="text" size="4" value="<?PHP echo $getData->attrtype5; ?>" maxlength="4" name="boni5">
        <input type="text" name="boniv5" value="<?PHP echo $getData->attrvalue5; ?>" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #7:</th>
      <td class="tdunkel">
        <input type="text" size="4" value="<?PHP echo $getData->attrtype6; ?>" maxlength="4" name="boni6">
        <input type="text" name="boniv6" value="<?PHP echo $getData->attrvalue6; ?>" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine" colspan="2" style="text-align:center;"><input type="submit" name="submit" value="bearbeiten"/> &bull; <input type="reset" value="zur&uuml;cksetzen"/></th>
    </tr>
  </table>
</form>
<?PHP
      }
      else { echo'<p class="meldung">Die angegebene ID existiert nicht.<p>'; }
    }
    else { echo'<p class="meldung">Keine g&uuml;ltige ID angegeben.<p>'; }
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>			</div>

  </div> 
				<div class="postui2 text-end">
             
                
                  
    </div>