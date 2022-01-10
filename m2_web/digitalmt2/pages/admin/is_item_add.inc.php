
			<div class="postui2 text-title">
					<h2>
                    Itemshop - Items Hinzufügen
                    
                    </h2>
				
				</div>
				<div class="postui2 text-con">
				<div class="con-wrap">
<?PHP
  if($_SESSION['user_admin']>=$adminRights['is_items']) {
?>
<form enctype="multipart/form-data" action="index.php?s=admin&a=is_items" method="POST">
  <table>
    <tr>
      <th class="topLine">Item / Vnum</th>
      <td class="tdunkel">
          <?PHP
            listItems();
          ?>
          <select name="itemgrad">
            <option value="0">+0</option>
            <option value="1">+1</option>
            <option value="2">+2</option>
            <option value="3">+3</option>
            <option value="4">+4</option>
            <option value="5">+5</option>
            <option value="6">+6</option>
            <option value="7">+7</option>
            <option value="8">+8</option>
            <option value="9">+9</option>
          </select>
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
              echo'<option value="'.$getKats->id.'">'.$getKats->titel.'</option>';
            }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <th class="topLine">Beschreibung:</th>
      <td class="tdunkel"><input type="text" name="beschreibung" maxlength="200" size="75"/></td>
    </tr>
    <tr>
      <th class="topLine">Bild:</th>
      <td class="tdunkel"><input type="file" name="bildupload"/></td>
    </tr>
    <tr>
      <th class="topLine">Preis:</th>
      <td class="tdunkel"><input type="text" name="preis" maxlength="10" size="10"/> Coins</td>
    </tr>
    <tr>
      <th class="topLine">Anzeigen:</th>
      <td class="tdunkel">
        <select name="anzeigen">
          <option value="J">Ja</option>
          <option value="N">Nein</option>
        </select>
      </td>
    </tr>
    <tr>
      <td class="thell" style="text-align:center;" colspan="2">Die folgenden Werte sollten mit Vorsicht gesetzt werden.</td>
    </tr>
    <tr>
      <th class="topLine">Socket #1:</th>
      <td class="thell">
        <input type="text" size="10" maxlength="10" name="socket0">
      </td>
    </tr>
    <tr>
      <th class="topLine">Socket #2:</th>
      <td class="tdunkel">
        <input type="text" size="10" maxlength="10" name="socket1">
      </td>
    </tr>
    <tr>
      <th class="topLine">Socket #3:</th>
      <td class="thell">
        <input type="text" size="10" maxlength="10" name="socket2">
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #1:</th>
      <td class="tdunkel">
        <input type="text" size="4" maxlength="4" name="boni0">
        <input type="text" name="boniv0" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #2:</th>
      <td class="thell">
        <input type="text" size="4" maxlength="4" name="boni1">
        <input type="text" name="boniv1" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #3:</th>
      <td class="tdunkel">
        <input type="text" size="4" maxlength="4" name="boni2">
        <input type="text" name="boniv2" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #4:</th>
      <td class="thell">
        <input type="text" size="4" maxlength="4" name="boni3">
        <input type="text" name="boniv3" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #5:</th>
      <td class="tdunkel">
        <input type="text" size="4" maxlength="4" name="boni4">
        <input type="text" name="boniv4" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #6:</th>
      <td class="thell">
        <input type="text" size="4" maxlength="4" name="boni5">
        <input type="text" name="boniv5" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine">Bonus (Bonus, Wert) #7:</th>
      <td class="tdunkel">
        <input type="text" size="4" maxlength="4" name="boni6">
        <input type="text" name="boniv6" size="6" maxlength="6"/>
      </td>
    </tr>
    <tr>
      <th class="topLine" colspan="2" style="text-align:center;"><input type="submit" name="submit" value="eintragen"/> &bull; <input type="reset" value="zur&uuml;cksetzen"/></th>
    </tr>
  </table>
</form>
<?PHP
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>			</div>

  </div> 
				<div class="postui2 text-end">
             
                
                  
    </div>