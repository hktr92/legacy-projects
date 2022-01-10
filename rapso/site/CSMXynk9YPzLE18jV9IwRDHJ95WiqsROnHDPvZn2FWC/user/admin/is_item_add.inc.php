<?PHP
  if($_SESSION['user_admin']>=$adminRights['is_items']) {
?>
<form enctype="multipart/form-data" action="index.php?s=admin&a=is_items" method="POST">
  <table>
    <tr>
      <th class="topLine" rowspan="2">Iteme (selecta&#355;i elementul sau introduce&#355;i vnum)</th>
      <td class="topLine">
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
        &nbsp;
        <input type="checkbox" name="ugroesser" value="1"/> 
        profil superior
      </td>
      <td class="topLine" rowspan="2"><input type="submit" name="submit" value="Cauta"/></td>
    </tr>
    <tr>
      <td class="topLine">
        <input type="text" name="vnum" size="8" maxlength="11"/> (vnum)
      </td>
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
              echo'<option value="'.$getKats->id.'">'.$getKats->titel.'</option>';
            }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <th class="topLine">Descriere:</th>
      <td class="tdunkel"><input type="text" name="beschreibung" maxlength="200" size="25"/></td>
    </tr>
    <tr>
      <th class="topLine">Imagine:</th>
      <td class="tdunkel"><input type="file" name="bildupload"/></td>
    </tr>
    <tr>
      <th class="topLine">Costurile:</th>
      <td class="tdunkel"><input type="text" name="preis" maxlength="10" size="10"/> Monede</td>
    </tr>
    <tr>
      <th class="topLine">Arat&#259;:</th>
      <td class="tdunkel">
        <select name="anzeigen">
          <option value="J">Da</option>
          <option value="N">Nu</option>
        </select>
      </td>
    </tr>
    <tr>
      <td class="thell" style="text-align:center;" colspan="2">Urm&#259;toarele valori vor trebui setate cu grij&#259;.</td>
    </tr>
            <tr>
            <td>Prima piatra:</td><td> 
            <select name='socket0'>
			<option>Selecteaza</option>
                        <option>-----------------</option>
			<option value='28030'>Piatra patrunderii +0</option>
			<option value='28130'>Piatra patrunderii +1</option>
			<option value='28230'>Piatra patrunderii +2</option>
			<option value='28330'>Piatra patrunderii +3</option>
			<option value='28430'>Piatra patrunderii +4</option>
			<option value='28530'>Piatra patrunderii +5</option>
			<option value='28630'>Piatra patrunderii +6</option>
			<option>-----------------------------------------</option>
			<option value='28031'>Piatra lovitura-fatala +0</option>
			<option value='28131'>Piatra lovitura-fatala +1</option>
			<option value='28231'>Piatra lovitura-fatala +2</option>
			<option value='28331'>Piatra lovitura-fatala +3</option>
			<option value='28431'>Piatra lovitura-fatala +4</option>
			<option value='28531'>Piatra lovitura-fatala +5</option>
			<option value='28631'>Piatra lovitura-fatala +6</option>
			<option>-----------------------------------------</option>
			<option value='28032'>Piatra reintoarcerii +0</option>
			<option value='28132'>Piatra reintoarcerii +1</option>
			<option value='28232'>Piatra reintoarcerii +2</option>
			<option value='28332'>Piatra reintoarcerii +3</option>
			<option value='28432'>Piatra reintoarcerii +4</option>
			<option value='28532'>Piatra reintoarcerii +5</option>
			<option value='28632'>Piatra reintoarcerii +6</option>
			<option>-----------------------------------------</option>
			<option value='28033'>Piatra anti-razboinici +0</option>
			<option value='28133'>Piatra anti-razboinici +1</option>
			<option value='28233'>Piatra anti-razboinici +2</option>
			<option value='28333'>Piatra anti-razboinici +3</option>
			<option value='28433'>Piatra anti-razboinici +4</option>
			<option value='28533'>Piatra anti-razboinici +5</option>
			<option value='28633'>Piatra anti-razboinici +6</option>
			<option>-----------------------------------------</option>
			<option value='28034'>Piatra anti-ninja +0</option>
			<option value='28134'>Piatra anti-ninja +1</option>
			<option value='28234'>Piatra anti-ninja +2</option>
			<option value='28334'>Piatra anti-ninja +3</option>
			<option value='28434'>Piatra anti-ninja +4</option>
			<option value='28534'>Piatra anti-ninja +5</option>
			<option value='28634'>Piatra anti-ninja +6</option>
			<option>-----------------------------------------</option>
			<option value='28035'>Piatra anti-sura +0</option>
			<option value='28135'>Piatra anti-sura +1</option>
			<option value='28235'>Piatra anti-sura +2</option>
			<option value='28335'>Piatra anti-sura +3</option>
			<option value='28435'>Piatra anti-sura +4</option>
			<option value='28535'>Piatra anti-sura +5</option>
			<option value='28635'>Piatra anti-sura +6</option>
			<option>-----------------------------------------</option>
			<option value='28036'>Piatra anti-saman +0</option>
			<option value='28136'>Piatra anti-saman +1</option>
			<option value='28236'>Piatra anti-saman +2</option>
			<option value='28336'>Piatra anti-saman +3</option>
			<option value='28436'>Piatra anti-saman +4</option>
			<option value='28536'>Piatra anti-saman +5</option>
			<option value='28636'>Piatra anti-saman +6</option>
			<option>-----------------------------------------</option>
			<option value='28037'>Piatra monstrilor +0</option>
			<option value='28137'>Piatra monstrilor +1</option>
			<option value='28237'>Piatra monstrilor +2</option>
			<option value='28337'>Piatra monstrilor +3</option>
			<option value='28437'>Piatra monstrilor +4</option>
			<option value='28537'>Piatra monstrilor +5</option>
			<option value='28637'>Piatra monstrilor +6</option>
			<option>-----------------------------------------</option>
			<option value='28038'>Piatra eschivei +0</option>
			<option value='28138'>Piatra eschivei +1</option>
			<option value='28238'>Piatra eschivei +2</option>
			<option value='28338'>Piatra eschivei +3</option>
			<option value='28438'>Piatra eschivei +4</option>
			<option value='28538'>Piatra eschivei +5</option>
			<option value='28638'>Piatra eschivei +6</option>
			<option>-----------------------------------------</option>
			<option value='28039'>Piatra pitularii +0</option>
			<option value='28139'>Piatra pitularii +1</option>
			<option value='28239'>Piatra pitularii +2</option>
			<option value='28339'>Piatra pitularii +3</option>
			<option value='28439'>Piatra pitularii +4</option>
			<option value='28539'>Piatra pitularii +5</option>
			<option value='28639'>Piatra pitularii +6</option>
			<option>-----------------------------------------</option>
			<option value='28040'>Piatra magiei +0</option>
			<option value='28140'>Piatra magiei +1</option>
			<option value='28240'>Piatra magiei +2</option>
			<option value='28340'>Piatra magiei +3</option>
			<option value='28440'>Piatra magiei +4</option>
			<option value='28540'>Piatra magiei +5</option>
			<option value='28640'>Piatra magiei +6</option>
			<option>-----------------------------------------</option>
			<option value='28041'>Piatra vitalitatii +0</option>
			<option value='28141'>Piatra vitalitatii +1</option>
			<option value='28241'>Piatra vitalitatii +2</option>
			<option value='28341'>Piatra vitalitatii +3</option>
			<option value='28441'>Piatra vitalitatii +4</option>
			<option value='28541'>Piatra vitalitatii +5</option>
			<option value='28641'>Piatra vitalitatii +6</option>
			<option>-----------------------------------------</option>
			<option value='28042'>Piatra protectiei +0</option>
			<option value='28142'>Piatra protectiei +1</option>
			<option value='28242'>Piatra protectiei +2</option>
			<option value='28342'>Piatra protectiei +3</option>
			<option value='28442'>Piatra protectiei +4</option>
			<option value='28542'>Piatra protectiei +5</option>
			<option value='28642'>Piatra protectiei +6</option>
			<option>-----------------------------------------</option>
			<option value='28043'>Piatra grabei +0</option>
			<option value='28143'>Piatra grabei +1</option>
			<option value='28243'>Piatra grabei +2</option>
			<option value='28343'>Piatra grabei +3</option>
			<option value='28443'>Piatra grabei +4</option>
			<option value='28543'>Piatra grabei +5</option>
			<option value='28643'>Piatra grabei +6</option>
			</select>
			</td>
            </tr>

            <tr>
            <td>A doua piatra:</td><td> 
                                   <select name='socket1'>
			<option>Selecteaza</option>
                        <option>-----------------</option>
			<option value='28030'>Piatra patrunderii +0</option>
			<option value='28130'>Piatra patrunderii +1</option>
			<option value='28230'>Piatra patrunderii +2</option>
			<option value='28330'>Piatra patrunderii +3</option>
			<option value='28430'>Piatra patrunderii +4</option>
			<option value='28530'>Piatra patrunderii +5</option>
			<option value='28630'>Piatra patrunderii +6</option>
			<option>-----------------------------------------</option>
			<option value='28031'>Piatra lovitura-fatala +0</option>
			<option value='28131'>Piatra lovitura-fatala +1</option>
			<option value='28231'>Piatra lovitura-fatala +2</option>
			<option value='28331'>Piatra lovitura-fatala +3</option>
			<option value='28431'>Piatra lovitura-fatala +4</option>
			<option value='28531'>Piatra lovitura-fatala +5</option>
			<option value='28631'>Piatra lovitura-fatala +6</option>
			<option>-----------------------------------------</option>
			<option value='28032'>Piatra reintoarcerii +0</option>
			<option value='28132'>Piatra reintoarcerii +1</option>
			<option value='28232'>Piatra reintoarcerii +2</option>
			<option value='28332'>Piatra reintoarcerii +3</option>
			<option value='28432'>Piatra reintoarcerii +4</option>
			<option value='28532'>Piatra reintoarcerii +5</option>
			<option value='28632'>Piatra reintoarcerii +6</option>
			<option>-----------------------------------------</option>
			<option value='28033'>Piatra anti-razboinici +0</option>
			<option value='28133'>Piatra anti-razboinici +1</option>
			<option value='28233'>Piatra anti-razboinici +2</option>
			<option value='28333'>Piatra anti-razboinici +3</option>
			<option value='28433'>Piatra anti-razboinici +4</option>
			<option value='28533'>Piatra anti-razboinici +5</option>
			<option value='28633'>Piatra anti-razboinici +6</option>
			<option>-----------------------------------------</option>
			<option value='28034'>Piatra anti-ninja +0</option>
			<option value='28134'>Piatra anti-ninja +1</option>
			<option value='28234'>Piatra anti-ninja +2</option>
			<option value='28334'>Piatra anti-ninja +3</option>
			<option value='28434'>Piatra anti-ninja +4</option>
			<option value='28534'>Piatra anti-ninja +5</option>
			<option value='28634'>Piatra anti-ninja +6</option>
			<option>-----------------------------------------</option>
			<option value='28035'>Piatra anti-sura +0</option>
			<option value='28135'>Piatra anti-sura +1</option>
			<option value='28235'>Piatra anti-sura +2</option>
			<option value='28335'>Piatra anti-sura +3</option>
			<option value='28435'>Piatra anti-sura +4</option>
			<option value='28535'>Piatra anti-sura +5</option>
			<option value='28635'>Piatra anti-sura +6</option>
			<option>-----------------------------------------</option>
			<option value='28036'>Piatra anti-saman +0</option>
			<option value='28136'>Piatra anti-saman +1</option>
			<option value='28236'>Piatra anti-saman +2</option>
			<option value='28336'>Piatra anti-saman +3</option>
			<option value='28436'>Piatra anti-saman +4</option>
			<option value='28536'>Piatra anti-saman +5</option>
			<option value='28636'>Piatra anti-saman +6</option>
			<option>-----------------------------------------</option>
			<option value='28037'>Piatra monstrilor +0</option>
			<option value='28137'>Piatra monstrilor +1</option>
			<option value='28237'>Piatra monstrilor +2</option>
			<option value='28337'>Piatra monstrilor +3</option>
			<option value='28437'>Piatra monstrilor +4</option>
			<option value='28537'>Piatra monstrilor +5</option>
			<option value='28637'>Piatra monstrilor +6</option>
			<option>-----------------------------------------</option>
			<option value='28038'>Piatra eschivei +0</option>
			<option value='28138'>Piatra eschivei +1</option>
			<option value='28238'>Piatra eschivei +2</option>
			<option value='28338'>Piatra eschivei +3</option>
			<option value='28438'>Piatra eschivei +4</option>
			<option value='28538'>Piatra eschivei +5</option>
			<option value='28638'>Piatra eschivei +6</option>
			<option>-----------------------------------------</option>
			<option value='28039'>Piatra pitularii +0</option>
			<option value='28139'>Piatra pitularii +1</option>
			<option value='28239'>Piatra pitularii +2</option>
			<option value='28339'>Piatra pitularii +3</option>
			<option value='28439'>Piatra pitularii +4</option>
			<option value='28539'>Piatra pitularii +5</option>
			<option value='28639'>Piatra pitularii +6</option>
			<option>-----------------------------------------</option>
			<option value='28040'>Piatra magiei +0</option>
			<option value='28140'>Piatra magiei +1</option>
			<option value='28240'>Piatra magiei +2</option>
			<option value='28340'>Piatra magiei +3</option>
			<option value='28440'>Piatra magiei +4</option>
			<option value='28540'>Piatra magiei +5</option>
			<option value='28640'>Piatra magiei +6</option>
			<option>-----------------------------------------</option>
			<option value='28041'>Piatra vitalitatii +0</option>
			<option value='28141'>Piatra vitalitatii +1</option>
			<option value='28241'>Piatra vitalitatii +2</option>
			<option value='28341'>Piatra vitalitatii +3</option>
			<option value='28441'>Piatra vitalitatii +4</option>
			<option value='28541'>Piatra vitalitatii +5</option>
			<option value='28641'>Piatra vitalitatii +6</option>
			<option>-----------------------------------------</option>
			<option value='28042'>Piatra protectiei +0</option>
			<option value='28142'>Piatra protectiei +1</option>
			<option value='28242'>Piatra protectiei +2</option>
			<option value='28342'>Piatra protectiei +3</option>
			<option value='28442'>Piatra protectiei +4</option>
			<option value='28542'>Piatra protectiei +5</option>
			<option value='28642'>Piatra protectiei +6</option>
			<option>-----------------------------------------</option>
			<option value='28043'>Piatra grabei +0</option>
			<option value='28143'>Piatra grabei +1</option>
			<option value='28243'>Piatra grabei +2</option>
			<option value='28343'>Piatra grabei +3</option>
			<option value='28443'>Piatra grabei +4</option>
			<option value='28543'>Piatra grabei +5</option>
			<option value='28643'>Piatra grabei +6</option>
			</select>
			</td>
            </tr>

            <tr>
            <td>A treia piatra:</td><td> 
            <select name='socket2'>
			<option>Selecteaza</option>
                        <option>-----------------</option>
			<option value='28030'>Piatra patrunderii +0</option>
			<option value='28130'>Piatra patrunderii +1</option>
			<option value='28230'>Piatra patrunderii +2</option>
			<option value='28330'>Piatra patrunderii +3</option>
			<option value='28430'>Piatra patrunderii +4</option>
			<option value='28530'>Piatra patrunderii +5</option>
			<option value='28630'>Piatra patrunderii +6</option>
			<option>-----------------------------------------</option>
			<option value='28031'>Piatra lovitura-fatala +0</option>
			<option value='28131'>Piatra lovitura-fatala +1</option>
			<option value='28231'>Piatra lovitura-fatala +2</option>
			<option value='28331'>Piatra lovitura-fatala +3</option>
			<option value='28431'>Piatra lovitura-fatala +4</option>
			<option value='28531'>Piatra lovitura-fatala +5</option>
			<option value='28631'>Piatra lovitura-fatala +6</option>
			<option>-----------------------------------------</option>
			<option value='28032'>Piatra reintoarcerii +0</option>
			<option value='28132'>Piatra reintoarcerii +1</option>
			<option value='28232'>Piatra reintoarcerii +2</option>
			<option value='28332'>Piatra reintoarcerii +3</option>
			<option value='28432'>Piatra reintoarcerii +4</option>
			<option value='28532'>Piatra reintoarcerii +5</option>
			<option value='28632'>Piatra reintoarcerii +6</option>
			<option>-----------------------------------------</option>
			<option value='28033'>Piatra anti-razboinici +0</option>
			<option value='28133'>Piatra anti-razboinici +1</option>
			<option value='28233'>Piatra anti-razboinici +2</option>
			<option value='28333'>Piatra anti-razboinici +3</option>
			<option value='28433'>Piatra anti-razboinici +4</option>
			<option value='28533'>Piatra anti-razboinici +5</option>
			<option value='28633'>Piatra anti-razboinici +6</option>
			<option>-----------------------------------------</option>
			<option value='28034'>Piatra anti-ninja +0</option>
			<option value='28134'>Piatra anti-ninja +1</option>
			<option value='28234'>Piatra anti-ninja +2</option>
			<option value='28334'>Piatra anti-ninja +3</option>
			<option value='28434'>Piatra anti-ninja +4</option>
			<option value='28534'>Piatra anti-ninja +5</option>
			<option value='28634'>Piatra anti-ninja +6</option>
			<option>-----------------------------------------</option>
			<option value='28035'>Piatra anti-sura +0</option>
			<option value='28135'>Piatra anti-sura +1</option>
			<option value='28235'>Piatra anti-sura +2</option>
			<option value='28335'>Piatra anti-sura +3</option>
			<option value='28435'>Piatra anti-sura +4</option>
			<option value='28535'>Piatra anti-sura +5</option>
			<option value='28635'>Piatra anti-sura +6</option>
			<option>-----------------------------------------</option>
			<option value='28036'>Piatra anti-saman +0</option>
			<option value='28136'>Piatra anti-saman +1</option>
			<option value='28236'>Piatra anti-saman +2</option>
			<option value='28336'>Piatra anti-saman +3</option>
			<option value='28436'>Piatra anti-saman +4</option>
			<option value='28536'>Piatra anti-saman +5</option>
			<option value='28636'>Piatra anti-saman +6</option>
			<option>-----------------------------------------</option>
			<option value='28037'>Piatra monstrilor +0</option>
			<option value='28137'>Piatra monstrilor +1</option>
			<option value='28237'>Piatra monstrilor +2</option>
			<option value='28337'>Piatra monstrilor +3</option>
			<option value='28437'>Piatra monstrilor +4</option>
			<option value='28537'>Piatra monstrilor +5</option>
			<option value='28637'>Piatra monstrilor +6</option>
			<option>-----------------------------------------</option>
			<option value='28038'>Piatra eschivei +0</option>
			<option value='28138'>Piatra eschivei +1</option>
			<option value='28238'>Piatra eschivei +2</option>
			<option value='28338'>Piatra eschivei +3</option>
			<option value='28438'>Piatra eschivei +4</option>
			<option value='28538'>Piatra eschivei +5</option>
			<option value='28638'>Piatra eschivei +6</option>
			<option>-----------------------------------------</option>
			<option value='28039'>Piatra pitularii +0</option>
			<option value='28139'>Piatra pitularii +1</option>
			<option value='28239'>Piatra pitularii +2</option>
			<option value='28339'>Piatra pitularii +3</option>
			<option value='28439'>Piatra pitularii +4</option>
			<option value='28539'>Piatra pitularii +5</option>
			<option value='28639'>Piatra pitularii +6</option>
			<option>-----------------------------------------</option>
			<option value='28040'>Piatra magiei +0</option>
			<option value='28140'>Piatra magiei +1</option>
			<option value='28240'>Piatra magiei +2</option>
			<option value='28340'>Piatra magiei +3</option>
			<option value='28440'>Piatra magiei +4</option>
			<option value='28540'>Piatra magiei +5</option>
			<option value='28640'>Piatra magiei +6</option>
			<option>-----------------------------------------</option>
			<option value='28041'>Piatra vitalitatii +0</option>
			<option value='28141'>Piatra vitalitatii +1</option>
			<option value='28241'>Piatra vitalitatii +2</option>
			<option value='28341'>Piatra vitalitatii +3</option>
			<option value='28441'>Piatra vitalitatii +4</option>
			<option value='28541'>Piatra vitalitatii +5</option>
			<option value='28641'>Piatra vitalitatii +6</option>
			<option>-----------------------------------------</option>
			<option value='28042'>Piatra protectiei +0</option>
			<option value='28142'>Piatra protectiei +1</option>
			<option value='28242'>Piatra protectiei +2</option>
			<option value='28342'>Piatra protectiei +3</option>
			<option value='28442'>Piatra protectiei +4</option>
			<option value='28542'>Piatra protectiei +5</option>
			<option value='28642'>Piatra protectiei +6</option>
			<option>-----------------------------------------</option>
			<option value='28043'>Piatra grabei +0</option>
			<option value='28143'>Piatra grabei +1</option>
			<option value='28243'>Piatra grabei +2</option>
			<option value='28343'>Piatra grabei +3</option>
			<option value='28443'>Piatra grabei +4</option>
			<option value='28543'>Piatra grabei +5</option>
			<option value='28643'>Piatra grabei +6</option>
			</select>
			</td>
            </tr>

            <tr>
            <td>Bonususul nr. 1:</td><td> 
            <select name='attrtype0'>
			<option>Selecteaza</option>
                        <option>-----------------</option>
			<option value='72'>Paguba medie</option>
			<option value='71'>Paguba competentei</option>
			<option value='3'>Puterea vietii</option>
			<option value='1'>Max. PV</option>
			<option value='5'>Tarie</option>
			<option value='6'>Flexibilitate</option>
			<option value='4'>Inteligenta</option>
			<option value='7'>Viteza de atac</option>
			<option value='9'>Viteza farmecului</option>
			<option value='8'>Viteza de miscare</option>
			<option value='10'>Regenerare PV</option>
			<option value='11'>Regenerare PM</option>
			<option value='29'>Aparare sabie</option>
			<option value='30'>Aparare lama de doua maini</option>
			<option value='31'>Aparare pumnal</option>
			<option value='32'>Aparare clopot</option>
			<option value='33'>Aparare evantai</option>
			<option value='38'>Rezistenta vantului</option>
			<option value='34'>Rezistenta la sageti</option>
			<option value='35'>Rezistenta la foc</option>
			<option value='36'>Rezistenta la fulger</option>
			<option value='37'>Rezistenta la magie</option>
			<option value='41'>Rezistenta la otrava</option>
			<option value='73'>Rezistenta la paguba competentei</option>
			<option value='74'>Resistenza la paguba medie</option>
			<option value='63'>Tare impotriva monstrilor</option>
			<option value='17'>Tare impotriva semi-oamenilor</option>
			<option value='18'>Tare impotriva animalelor</option>
			<option value='19'>Tare impotriva orcilor</option>
			<option value='20'>Tare impotriva esotericilor</option>
			<option value='21'>Tare impotriva vampirilor</option>
			<option value='22'>Tare impotriva diavolului</option>
			<option value='23'>Paguba absorbita de PV</option>
			<option value='24'>Paguba absorbita de PM</option>
			<option value='13'>Sansa necunostintei</option>
			<option value='12'>Sansa de otravire</option>
			<option value='14'>Sansa incetinirii</option>
			<option value='15'>Sansa unei lovituri critice</option>
			<option value='16'>Sansa unei lovituri patrunzatoare</option>
			<option value='25'>Sansa de a prelua PM-ul inamicului</option>
			<option value='26'>Sansa de a primi PM-ul lovind adversarul</option>
			<option value='28'>Sansa de a evita atacul cu sageti</option>
			<option value='27'>Sansa de a bloca atacul corporal</option>
			<option value='39'>Sansa de a reflecta atacul corporal</option>
			<option value='40'>Sansa de a reflecta un blestem</option>
			<option value='42'>Sansa de regenerare PM</option>
			<option value='47'>Sansa de regenerare PV</option>
			<option value='43'>Sansa de a primi mai multa experienta</option>
			<option value='44'>Sansa de a-ti pica Yang</option>
			<option value='45'>Sansa de a-ti pica obiecte</option>
			<option value='77'>Sansa de a imbunatati un obiect</option>
			<option value='78'>Sansa de aparare contra razboinici</option>
			<option value='79'>Sansa de aparare contra ninja</option>
			<option value='80'>Sansa de aparare contra sura</option>
			<option value='81'>Sansa de aparare contra samani</option>
			<option value='46'>Sansa de a mari efectul potiunilor</option>
			<option value='49'>Imun la incetinire</option>
			<option value='50'>Imun la cazatura</option>
			<option value='48'>Imun la necunostinta</option>
			<option value='52'>Autonomia arcului</option>
			<option value='53'>Valoarea atacului</option>
			<option value='54'>Aparare</option>
			<option value='55'>Valoare atacului magic</option>
			<option value='56'>Aparare magica</option>
			<option value='59'>Tare impotriva razboinicilor</option>
			<option value='60'>Tare impotriva ninja</option>
			<option value='61'>Tare impotriva sura</option>
			<option value='62'>Tare impotriva samanilor</option>			
			</select></td>
            </tr>

            <tr>
            <td>Valorea bonusului nr. 1:</td><td> 
            <input tabindex='2' name='attrvalue0' class='application' size='30' /></td>
            </tr>

            <tr>
            <td>Bonususul nr. 2:</td><td> 
                        <select name='attrtype1'>
			<option>Selecteaza</option>
                        <option>-----------------</option>
			<option value='72'>Paguba medie</option>
			<option value='71'>Paguba competentei</option>
			<option value='3'>Puterea vietii</option>
			<option value='1'>Max. PV</option>
			<option value='5'>Tarie</option>
			<option value='6'>Flexibilitate</option>
			<option value='4'>Inteligenta</option>
			<option value='7'>Viteza de atac</option>
			<option value='9'>Viteza farmecului</option>
			<option value='8'>Viteza de miscare</option>
			<option value='10'>Regenerare PV</option>
			<option value='11'>Regenerare PM</option>
			<option value='29'>Aparare sabie</option>
			<option value='30'>Aparare lama de doua maini</option>
			<option value='31'>Aparare pumnal</option>
			<option value='32'>Aparare clopot</option>
			<option value='33'>Aparare evantai</option>
			<option value='38'>Rezistenta vantului</option>
			<option value='34'>Rezistenta la sageti</option>
			<option value='35'>Rezistenta la foc</option>
			<option value='36'>Rezistenta la fulger</option>
			<option value='37'>Rezistenta la magie</option>
			<option value='41'>Rezistenta la otrava</option>
			<option value='73'>Rezistenta la paguba competentei</option>
			<option value='74'>Resistenza la paguba medie</option>
			<option value='63'>Tare impotriva monstrilor</option>
			<option value='17'>Tare impotriva semi-oamenilor</option>
			<option value='18'>Tare impotriva animalelor</option>
			<option value='19'>Tare impotriva orcilor</option>
			<option value='20'>Tare impotriva esotericilor</option>
			<option value='21'>Tare impotriva vampirilor</option>
			<option value='22'>Tare impotriva diavolului</option>
			<option value='23'>Paguba absorbita de PV</option>
			<option value='24'>Paguba absorbita de PM</option>
			<option value='13'>Sansa necunostintei</option>
			<option value='12'>Sansa de otravire</option>
			<option value='14'>Sansa incetinirii</option>
			<option value='15'>Sansa unei lovituri critice</option>
			<option value='16'>Sansa unei lovituri patrunzatoare</option>
			<option value='25'>Sansa de a prelua PM-ul inamicului</option>
			<option value='26'>Sansa de a primi PM-ul lovind adversarul</option>
			<option value='28'>Sansa de a evita atacul cu sageti</option>
			<option value='27'>Sansa de a bloca atacul corporal</option>
			<option value='39'>Sansa de a reflecta atacul corporal</option>
			<option value='40'>Sansa de a reflecta un blestem</option>
			<option value='42'>Sansa de regenerare PM</option>
			<option value='47'>Sansa de regenerare PV</option>
			<option value='43'>Sansa de a primi mai multa experienta</option>
			<option value='44'>Sansa de a-ti pica Yang</option>
			<option value='45'>Sansa de a-ti pica obiecte</option>
			<option value='77'>Sansa de a imbunatati un obiect</option>
			<option value='78'>Sansa de aparare contra razboinici</option>
			<option value='79'>Sansa de aparare contra ninja</option>
			<option value='80'>Sansa de aparare contra sura</option>
			<option value='81'>Sansa de aparare contra samani</option>
			<option value='46'>Sansa de a mari efectul potiunilor</option>
			<option value='49'>Imun la incetinire</option>
			<option value='50'>Imun la cazatura</option>
			<option value='48'>Imun la necunostinta</option>
			<option value='52'>Autonomia arcului</option>
			<option value='53'>Valoarea atacului</option>
			<option value='54'>Aparare</option>
			<option value='55'>Valoare atacului magic</option>
			<option value='56'>Aparare magica</option>
			<option value='59'>Tare impotriva razboinicilor</option>
			<option value='60'>Tare impotriva ninja</option>
			<option value='61'>Tare impotriva sura</option>
			<option value='62'>Tare impotriva samanilor</option>
			</select></td>
            </tr>

            <tr>
            <td>Valorea bonusului nr. 2:</td><td> 
            <input tabindex='2' name='attrvalue1' class='application' size='30' /></td>
            </tr>

            <tr>
            <td>Bonususul nr. 3:</td><td> 
                        <select name='attrtype2'>
			<option>Selecteaza</option>
                        <option>-----------------</option>
			<option value='72'>Paguba medie</option>
			<option value='71'>Paguba competentei</option>
			<option value='3'>Puterea vietii</option>
			<option value='1'>Max. PV</option>
			<option value='5'>Tarie</option>
			<option value='6'>Flexibilitate</option>
			<option value='4'>Inteligenta</option>
			<option value='7'>Viteza de atac</option>
			<option value='9'>Viteza farmecului</option>
			<option value='8'>Viteza de miscare</option>
			<option value='10'>Regenerare PV</option>
			<option value='11'>Regenerare PM</option>
			<option value='29'>Aparare sabie</option>
			<option value='30'>Aparare lama de doua maini</option>
			<option value='31'>Aparare pumnal</option>
			<option value='32'>Aparare clopot</option>
			<option value='33'>Aparare evantai</option>
			<option value='38'>Rezistenta vantului</option>
			<option value='34'>Rezistenta la sageti</option>
			<option value='35'>Rezistenta la foc</option>
			<option value='36'>Rezistenta la fulger</option>
			<option value='37'>Rezistenta la magie</option>
			<option value='41'>Rezistenta la otrava</option>
			<option value='73'>Rezistenta la paguba competentei</option>
			<option value='74'>Resistenza la paguba medie</option>
			<option value='63'>Tare impotriva monstrilor</option>
			<option value='17'>Tare impotriva semi-oamenilor</option>
			<option value='18'>Tare impotriva animalelor</option>
			<option value='19'>Tare impotriva orcilor</option>
			<option value='20'>Tare impotriva esotericilor</option>
			<option value='21'>Tare impotriva vampirilor</option>
			<option value='22'>Tare impotriva diavolului</option>
			<option value='23'>Paguba absorbita de PV</option>
			<option value='24'>Paguba absorbita de PM</option>
			<option value='13'>Sansa necunostintei</option>
			<option value='12'>Sansa de otravire</option>
			<option value='14'>Sansa incetinirii</option>
			<option value='15'>Sansa unei lovituri critice</option>
			<option value='16'>Sansa unei lovituri patrunzatoare</option>
			<option value='25'>Sansa de a prelua PM-ul inamicului</option>
			<option value='26'>Sansa de a primi PM-ul lovind adversarul</option>
			<option value='28'>Sansa de a evita atacul cu sageti</option>
			<option value='27'>Sansa de a bloca atacul corporal</option>
			<option value='39'>Sansa de a reflecta atacul corporal</option>
			<option value='40'>Sansa de a reflecta un blestem</option>
			<option value='42'>Sansa de regenerare PM</option>
			<option value='47'>Sansa de regenerare PV</option>
			<option value='43'>Sansa de a primi mai multa experienta</option>
			<option value='44'>Sansa de a-ti pica Yang</option>
			<option value='45'>Sansa de a-ti pica obiecte</option>
			<option value='77'>Sansa de a imbunatati un obiect</option>
			<option value='78'>Sansa de aparare contra razboinici</option>
			<option value='79'>Sansa de aparare contra ninja</option>
			<option value='80'>Sansa de aparare contra sura</option>
			<option value='81'>Sansa de aparare contra samani</option>
			<option value='46'>Sansa de a mari efectul potiunilor</option>
			<option value='49'>Imun la incetinire</option>
			<option value='50'>Imun la cazatura</option>
			<option value='48'>Imun la necunostinta</option>
			<option value='52'>Autonomia arcului</option>
			<option value='53'>Valoarea atacului</option>
			<option value='54'>Aparare</option>
			<option value='55'>Valoare atacului magic</option>
			<option value='56'>Aparare magica</option>
			<option value='59'>Tare impotriva razboinicilor</option>
			<option value='60'>Tare impotriva ninja</option>
			<option value='61'>Tare impotriva sura</option>
			<option value='62'>Tare impotriva samanilor</option>
			</select></td>
            </tr>

            <tr>
            <td>Valorea bonusului nr. 3:</td><td> 
            <input tabindex='2' name='attrvalue2' class='application' size='30' /></td>
            </tr>

            <tr>
            <td>Bonususul nr. 4:</td><td> 
                        <select name='attrtype3'>
			<option>Selecteaza</option>
                        <option>-----------------</option>
			<option value='72'>Paguba medie</option>
			<option value='71'>Paguba competentei</option>
			<option value='3'>Puterea vietii</option>
			<option value='1'>Max. PV</option>
			<option value='5'>Tarie</option>
			<option value='6'>Flexibilitate</option>
			<option value='4'>Inteligenta</option>
			<option value='7'>Viteza de atac</option>
			<option value='9'>Viteza farmecului</option>
			<option value='8'>Viteza de miscare</option>
			<option value='10'>Regenerare PV</option>
			<option value='11'>Regenerare PM</option>
			<option value='29'>Aparare sabie</option>
			<option value='30'>Aparare lama de doua maini</option>
			<option value='31'>Aparare pumnal</option>
			<option value='32'>Aparare clopot</option>
			<option value='33'>Aparare evantai</option>
			<option value='38'>Rezistenta vantului</option>
			<option value='34'>Rezistenta la sageti</option>
			<option value='35'>Rezistenta la foc</option>
			<option value='36'>Rezistenta la fulger</option>
			<option value='37'>Rezistenta la magie</option>
			<option value='41'>Rezistenta la otrava</option>
			<option value='73'>Rezistenta la paguba competentei</option>
			<option value='74'>Resistenza la paguba medie</option>
			<option value='63'>Tare impotriva monstrilor</option>
			<option value='17'>Tare impotriva semi-oamenilor</option>
			<option value='18'>Tare impotriva animalelor</option>
			<option value='19'>Tare impotriva orcilor</option>
			<option value='20'>Tare impotriva esotericilor</option>
			<option value='21'>Tare impotriva vampirilor</option>
			<option value='22'>Tare impotriva diavolului</option>
			<option value='23'>Paguba absorbita de PV</option>
			<option value='24'>Paguba absorbita de PM</option>
			<option value='13'>Sansa necunostintei</option>
			<option value='12'>Sansa de otravire</option>
			<option value='14'>Sansa incetinirii</option>
			<option value='15'>Sansa unei lovituri critice</option>
			<option value='16'>Sansa unei lovituri patrunzatoare</option>
			<option value='25'>Sansa de a prelua PM-ul inamicului</option>
			<option value='26'>Sansa de a primi PM-ul lovind adversarul</option>
			<option value='28'>Sansa de a evita atacul cu sageti</option>
			<option value='27'>Sansa de a bloca atacul corporal</option>
			<option value='39'>Sansa de a reflecta atacul corporal</option>
			<option value='40'>Sansa de a reflecta un blestem</option>
			<option value='42'>Sansa de regenerare PM</option>
			<option value='47'>Sansa de regenerare PV</option>
			<option value='43'>Sansa de a primi mai multa experienta</option>
			<option value='44'>Sansa de a-ti pica Yang</option>
			<option value='45'>Sansa de a-ti pica obiecte</option>
			<option value='77'>Sansa de a imbunatati un obiect</option>
			<option value='78'>Sansa de aparare contra razboinici</option>
			<option value='79'>Sansa de aparare contra ninja</option>
			<option value='80'>Sansa de aparare contra sura</option>
			<option value='81'>Sansa de aparare contra samani</option>
			<option value='46'>Sansa de a mari efectul potiunilor</option>
			<option value='49'>Imun la incetinire</option>
			<option value='50'>Imun la cazatura</option>
			<option value='48'>Imun la necunostinta</option>
			<option value='52'>Autonomia arcului</option>
			<option value='53'>Valoarea atacului</option>
			<option value='54'>Aparare</option>
			<option value='55'>Valoare atacului magic</option>
			<option value='56'>Aparare magica</option>
			<option value='59'>Tare impotriva razboinicilor</option>
			<option value='60'>Tare impotriva ninja</option>
			<option value='61'>Tare impotriva sura</option>
			<option value='62'>Tare impotriva samanilor</option>
			</select></td>
            </tr>

            <tr>
            <td>Valorea bonusului nr. 4:</td><td> 
            <input tabindex='2' name='attrvalue3' class='application' size='30' /></td>
            </tr>

            <tr>
            <td>Bonususul nr. 5:</td><td> 
                        <select name='attrtype4'>
			<option>Selecteaza</option>
                        <option>-----------------</option>
			<option value='72'>Paguba medie</option>
			<option value='71'>Paguba competentei</option>
			<option value='3'>Puterea vietii</option>
			<option value='1'>Max. PV</option>
			<option value='5'>Tarie</option>
			<option value='6'>Flexibilitate</option>
			<option value='4'>Inteligenta</option>
			<option value='7'>Viteza de atac</option>
			<option value='9'>Viteza farmecului</option>
			<option value='8'>Viteza de miscare</option>
			<option value='10'>Regenerare PV</option>
			<option value='11'>Regenerare PM</option>
			<option value='29'>Aparare sabie</option>
			<option value='30'>Aparare lama de doua maini</option>
			<option value='31'>Aparare pumnal</option>
			<option value='32'>Aparare clopot</option>
			<option value='33'>Aparare evantai</option>
			<option value='38'>Rezistenta vantului</option>
			<option value='34'>Rezistenta la sageti</option>
			<option value='35'>Rezistenta la foc</option>
			<option value='36'>Rezistenta la fulger</option>
			<option value='37'>Rezistenta la magie</option>
			<option value='41'>Rezistenta la otrava</option>
			<option value='73'>Rezistenta la paguba competentei</option>
			<option value='74'>Resistenza la paguba medie</option>
			<option value='63'>Tare impotriva monstrilor</option>
			<option value='17'>Tare impotriva semi-oamenilor</option>
			<option value='18'>Tare impotriva animalelor</option>
			<option value='19'>Tare impotriva orcilor</option>
			<option value='20'>Tare impotriva esotericilor</option>
			<option value='21'>Tare impotriva vampirilor</option>
			<option value='22'>Tare impotriva diavolului</option>
			<option value='23'>Paguba absorbita de PV</option>
			<option value='24'>Paguba absorbita de PM</option>
			<option value='13'>Sansa necunostintei</option>
			<option value='12'>Sansa de otravire</option>
			<option value='14'>Sansa incetinirii</option>
			<option value='15'>Sansa unei lovituri critice</option>
			<option value='16'>Sansa unei lovituri patrunzatoare</option>
			<option value='25'>Sansa de a prelua PM-ul inamicului</option>
			<option value='26'>Sansa de a primi PM-ul lovind adversarul</option>
			<option value='28'>Sansa de a evita atacul cu sageti</option>
			<option value='27'>Sansa de a bloca atacul corporal</option>
			<option value='39'>Sansa de a reflecta atacul corporal</option>
			<option value='40'>Sansa de a reflecta un blestem</option>
			<option value='42'>Sansa de regenerare PM</option>
			<option value='47'>Sansa de regenerare PV</option>
			<option value='43'>Sansa de a primi mai multa experienta</option>
			<option value='44'>Sansa de a-ti pica Yang</option>
			<option value='45'>Sansa de a-ti pica obiecte</option>
			<option value='77'>Sansa de a imbunatati un obiect</option>
			<option value='78'>Sansa de aparare contra razboinici</option>
			<option value='79'>Sansa de aparare contra ninja</option>
			<option value='80'>Sansa de aparare contra sura</option>
			<option value='81'>Sansa de aparare contra samani</option>
			<option value='46'>Sansa de a mari efectul potiunilor</option>
			<option value='49'>Imun la incetinire</option>
			<option value='50'>Imun la cazatura</option>
			<option value='48'>Imun la necunostinta</option>
			<option value='52'>Autonomia arcului</option>
			<option value='53'>Valoarea atacului</option>
			<option value='54'>Aparare</option>
			<option value='55'>Valoare atacului magic</option>
			<option value='56'>Aparare magica</option>
			<option value='59'>Tare impotriva razboinicilor</option>
			<option value='60'>Tare impotriva ninja</option>
			<option value='61'>Tare impotriva sura</option>
			<option value='62'>Tare impotriva samanilor</option>
			</select></td>
            </tr>

            <tr>
            <td>Valorea bonusului nr. 5:</td><td> 
            <input tabindex='2' name='attrvalue4' class='application' size='30' /></td>
            </tr>

            <tr>
            <td>Bonususul nr. 6:</td><td> 
                        <select name='attrtype5'>
			<option>Selecteaza</option>
                        <option>-----------------</option>
			<option value='72'>Paguba medie</option>
			<option value='71'>Paguba competentei</option>
			<option value='3'>Puterea vietii</option>
			<option value='1'>Max. PV</option>
			<option value='5'>Tarie</option>
			<option value='6'>Flexibilitate</option>
			<option value='4'>Inteligenta</option>
			<option value='7'>Viteza de atac</option>
			<option value='9'>Viteza farmecului</option>
			<option value='8'>Viteza de miscare</option>
			<option value='10'>Regenerare PV</option>
			<option value='11'>Regenerare PM</option>
			<option value='29'>Aparare sabie</option>
			<option value='30'>Aparare lama de doua maini</option>
			<option value='31'>Aparare pumnal</option>
			<option value='32'>Aparare clopot</option>
			<option value='33'>Aparare evantai</option>
			<option value='38'>Rezistenta vantului</option>
			<option value='34'>Rezistenta la sageti</option>
			<option value='35'>Rezistenta la foc</option>
			<option value='36'>Rezistenta la fulger</option>
			<option value='37'>Rezistenta la magie</option>
			<option value='41'>Rezistenta la otrava</option>
			<option value='73'>Rezistenta la paguba competentei</option>
			<option value='74'>Resistenza la paguba medie</option>
			<option value='63'>Tare impotriva monstrilor</option>
			<option value='17'>Tare impotriva semi-oamenilor</option>
			<option value='18'>Tare impotriva animalelor</option>
			<option value='19'>Tare impotriva orcilor</option>
			<option value='20'>Tare impotriva esotericilor</option>
			<option value='21'>Tare impotriva vampirilor</option>
			<option value='22'>Tare impotriva diavolului</option>
			<option value='23'>Paguba absorbita de PV</option>
			<option value='24'>Paguba absorbita de PM</option>
			<option value='13'>Sansa necunostintei</option>
			<option value='12'>Sansa de otravire</option>
			<option value='14'>Sansa incetinirii</option>
			<option value='15'>Sansa unei lovituri critice</option>
			<option value='16'>Sansa unei lovituri patrunzatoare</option>
			<option value='25'>Sansa de a prelua PM-ul inamicului</option>
			<option value='26'>Sansa de a primi PM-ul lovind adversarul</option>
			<option value='28'>Sansa de a evita atacul cu sageti</option>
			<option value='27'>Sansa de a bloca atacul corporal</option>
			<option value='39'>Sansa de a reflecta atacul corporal</option>
			<option value='40'>Sansa de a reflecta un blestem</option>
			<option value='42'>Sansa de regenerare PM</option>
			<option value='47'>Sansa de regenerare PV</option>
			<option value='43'>Sansa de a primi mai multa experienta</option>
			<option value='44'>Sansa de a-ti pica Yang</option>
			<option value='45'>Sansa de a-ti pica obiecte</option>
			<option value='77'>Sansa de a imbunatati un obiect</option>
			<option value='78'>Sansa de aparare contra razboinici</option>
			<option value='79'>Sansa de aparare contra ninja</option>
			<option value='80'>Sansa de aparare contra sura</option>
			<option value='81'>Sansa de aparare contra samani</option>
			<option value='46'>Sansa de a mari efectul potiunilor</option>
			<option value='49'>Imun la incetinire</option>
			<option value='50'>Imun la cazatura</option>
			<option value='48'>Imun la necunostinta</option>
			<option value='52'>Autonomia arcului</option>
			<option value='53'>Valoarea atacului</option>
			<option value='54'>Aparare</option>
			<option value='55'>Valoare atacului magic</option>
			<option value='56'>Aparare magica</option>
			<option value='59'>Tare impotriva razboinicilor</option>
			<option value='60'>Tare impotriva ninja</option>
			<option value='61'>Tare impotriva sura</option>
			<option value='62'>Tare impotriva samanilor</option>
			</select></td>
            </tr>

            <tr>
            <td>Valorea bonusului nr. 6:</td><td> 
            <input tabindex='2' name='attrvalue5' class='application' size='30' /></td>
            </tr>

            <tr>
            <td>Bonususul nr. 7:</td><td> 
                        <select name='attrtype6'>
			<option>Selecteaza</option>
                        <option>-----------------</option>
			<option value='72'>Paguba medie</option>
			<option value='71'>Paguba competentei</option>
			<option value='3'>Puterea vietii</option>
			<option value='1'>Max. PV</option>
			<option value='5'>Tarie</option>
			<option value='6'>Flexibilitate</option>
			<option value='4'>Inteligenta</option>
			<option value='7'>Viteza de atac</option>
			<option value='9'>Viteza farmecului</option>
			<option value='8'>Viteza de miscare</option>
			<option value='10'>Regenerare PV</option>
			<option value='11'>Regenerare PM</option>
			<option value='29'>Aparare sabie</option>
			<option value='30'>Aparare lama de doua maini</option>
			<option value='31'>Aparare pumnal</option>
			<option value='32'>Aparare clopot</option>
			<option value='33'>Aparare evantai</option>
			<option value='38'>Rezistenta vantului</option>
			<option value='34'>Rezistenta la sageti</option>
			<option value='35'>Rezistenta la foc</option>
			<option value='36'>Rezistenta la fulger</option>
			<option value='37'>Rezistenta la magie</option>
			<option value='41'>Rezistenta la otrava</option>
			<option value='73'>Rezistenta la paguba competentei</option>
			<option value='74'>Resistenza la paguba medie</option>
			<option value='63'>Tare impotriva monstrilor</option>
			<option value='17'>Tare impotriva semi-oamenilor</option>
			<option value='18'>Tare impotriva animalelor</option>
			<option value='19'>Tare impotriva orcilor</option>
			<option value='20'>Tare impotriva esotericilor</option>
			<option value='21'>Tare impotriva vampirilor</option>
			<option value='22'>Tare impotriva diavolului</option>
			<option value='23'>Paguba absorbita de PV</option>
			<option value='24'>Paguba absorbita de PM</option>
			<option value='13'>Sansa necunostintei</option>
			<option value='12'>Sansa de otravire</option>
			<option value='14'>Sansa incetinirii</option>
			<option value='15'>Sansa unei lovituri critice</option>
			<option value='16'>Sansa unei lovituri patrunzatoare</option>
			<option value='25'>Sansa de a prelua PM-ul inamicului</option>
			<option value='26'>Sansa de a primi PM-ul lovind adversarul</option>
			<option value='28'>Sansa de a evita atacul cu sageti</option>
			<option value='27'>Sansa de a bloca atacul corporal</option>
			<option value='39'>Sansa de a reflecta atacul corporal</option>
			<option value='40'>Sansa de a reflecta un blestem</option>
			<option value='42'>Sansa de regenerare PM</option>
			<option value='47'>Sansa de regenerare PV</option>
			<option value='43'>Sansa de a primi mai multa experienta</option>
			<option value='44'>Sansa de a-ti pica Yang</option>
			<option value='45'>Sansa de a-ti pica obiecte</option>
			<option value='77'>Sansa de a imbunatati un obiect</option>
			<option value='78'>Sansa de aparare contra razboinici</option>
			<option value='79'>Sansa de aparare contra ninja</option>
			<option value='80'>Sansa de aparare contra sura</option>
			<option value='81'>Sansa de aparare contra samani</option>
			<option value='46'>Sansa de a mari efectul potiunilor</option>
			<option value='49'>Imun la incetinire</option>
			<option value='50'>Imun la cazatura</option>
			<option value='48'>Imun la necunostinta</option>
			<option value='52'>Autonomia arcului</option>
			<option value='53'>Valoarea atacului</option>
			<option value='54'>Aparare</option>
			<option value='55'>Valoare atacului magic</option>
			<option value='56'>Aparare magica</option>
			<option value='59'>Tare impotriva razboinicilor</option>
			<option value='60'>Tare impotriva ninja</option>
			<option value='61'>Tare impotriva sura</option>
			<option value='62'>Tare impotriva samanilor</option>
			</select></td>
            </tr>

            <tr>
            <td>Valorea bonusului nr. 7:</td><td> 
            <input tabindex='2' name='attrvalue6' class='application' size='30' /></td>
            </tr>
    <tr>
      <th class="topLine" colspan="2" style="text-align:center;"><input type="submit" name="submit" value="Adauga"/> &bull; <input type="reset" value="Reseteaz&#259;"/></th>
    </tr>
  </table>
</form>
<?PHP
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?>