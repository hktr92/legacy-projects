<?PHP
  if($_SESSION['user_admin']>=$adminRights['itemsearch']) {
    if(isset($_GET['char']) && !empty($_GET['char'])) $_SESSION['search_char']=$_GET['char'];
?>
<h2>Administrare - c&#259;utare iteme</h2>
  <p><br/>&nbsp;&nbsp;&nbsp;&nbsp;Aici pute&#355;i c&#259;uta si urm&#259;ri itemele din joc.</p><br/>
  <form action="index.php?s=admin&a=itemsearch" method="POST">
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
    </tr>
  </table>
  </form>
  
  <?PHP
  
    if(isset($_POST['submit']) && $_POST['submit']="Cauta") {
      if(!empty($_POST['itemtyp'])) {
        $getItemInput = compareItems($_POST['itemtyp']);
        if($getItemInput['maxStufe']==0) {
          $_POST['itemgrad']=0;
          $_POST['ugroesser']="";
        }
        if($_POST['ugroesser']==1 AND $_POST['itemgrad']<9) {
          $suchVNUM = $_POST['itemtyp']+$_POST['itemgrad'];
          $endVNUM = $_POST['itemtyp']+9;
          $sqlCmd="SELECT item.*,player.name,player.account_id,account.login 
          FROM player.item
          INNER JOIN player.player 
          ON player.id=item.owner_id 
          INNER JOIN account.account 
          ON account.id=player.account_id 
          WHERE item.vnum BETWEEN '".$suchVNUM."' AND '".$endVNUM."' 
          AND (window='INVENTORY' OR window='EQUIPMENT')";
          $sqlCmd2="SELECT item.*,account.id AS account_id,account.login 
          FROM player.item
          INNER JOIN account.account 
          ON account.id=item.owner_id 
          WHERE item.vnum BETWEEN '".$suchVNUM."' AND '".$endVNUM."' 
          AND window='SAFEBOX'";
        }
        else {
          $suchVNUM = $_POST['itemtyp']+$_POST['itemgrad'];
          $sqlCmd="SELECT item.*,player.name,player.account_id,account.login 
          FROM player.item
          INNER JOIN player.player 
          ON player.id=item.owner_id 
          INNER JOIN account.account 
          ON account.id=player.account_id 
          WHERE item.vnum='".$suchVNUM."' 
          AND (window='INVENTORY' OR window='EQUIPMENT')";
          $sqlCmd2="SELECT item.*,account.id AS account_id,account.login
          FROM player.item
          INNER JOIN account.account 
          ON account.id=item.owner_id 
          WHERE item.vnum='".$suchVNUM."' 
          AND window='SAFEBOX'";
        }
      }
      else {
        $sqlCmd="SELECT item.*,player.name,player.account_id,account.login 
        FROM player.item
        INNER JOIN player.player 
        ON player.id=item.owner_id 
        INNER JOIN account.account 
        ON account.id=player.account_id 
        WHERE item.vnum='".$_POST['vnum']."' 
        AND (window='INVENTORY' OR window='EQUIPMENT')";
        $sqlCmd2="SELECT item.*,account.id AS account_id,account.login
        FROM player.item
        INNER JOIN account.account 
        ON account.id=item.owner_id 
        WHERE item.vnum='".$_POST['vnum']."' 
        AND window='SAFEBOX'";
      }
      echo'<table class="itemlist">';
      echo'<tr>';
      echo'<th class="topLine">Caracter</th>';
      echo'<th class="topLine">Cont</th>';
      echo'<th class="topLine">Item</th>';
      echo'<th class="topLine">Loc</th>';
      echo'<th class="topLine">Pietre</th>';
      echo'<th class="topLine">Bonus</th>';
      echo'</tr>';
      
      $sqlQry=mysql_query($sqlCmd,$sqlServ);
      $x=0;
      while($getItem=mysql_fetch_object($sqlQry)) {
        $zF = (($x%2)==0) ? "tdunkel" : "thell";
        echo'<tr>';
        echo'<td class="'.$zF.'"><a href="index.php?s=admin&a=char&id='.$getItem->owner_id.'">'.$getItem->name.'</a></td>';
        echo'<td class="'.$zF.'"><a href="index.php?s=admin&a=users&acc='.$getItem->account_id.'">'.$getItem->login.'</a></td>';
        echo'<td class="'.$zF.'">';
        $getName = compareItems($getItem->vnum);
        $itemStufe = (checkInt($getName['stufe'])) ? "+".$getName['stufe'] : '';
        echo $getName['item'].$itemStufe;
        echo'</td>';
        echo'<td class="'.$zF.'">'.$getItem->window.'</td>';
        echo'<td class="'.$zF.'">';
        for($i=0;$i<6;$i++) {
            if($i==0) { $akSocket = $getItem->socket0; }
            if($i==1) { $akSocket = $getItem->socket1; }
            if($i==2) { $akSocket = $getItem->socket2; }
            if($i==3) { $akSocket = $getItem->socket3; }
            if($i==4) { $akSocket = $getItem->socket4; }
            if($i==5) { $akSocket = $getItem->socket5; }
            echo'#'.($i+1).'&nbsp;';
            if(isset($itemSteine[$akSocket])) {
              echo $itemSteine[$akSocket];
            }
            else {
              echo $akSocket;
            }
            echo'<br/>';
          
          }
        echo'</td>';
        echo'<td class="'.$zF.'">';
        for($i=0;$i<7;$i++) {
            if($i==0) { $akBoni = $getItem->attrtype0; $akWert = $getItem->attrvalue0; }
            if($i==1) { $akBoni = $getItem->attrtype1; $akWert = $getItem->attrvalue1; }
            if($i==2) { $akBoni = $getItem->attrtype2; $akWert = $getItem->attrvalue2; }
            if($i==3) { $akBoni = $getItem->attrtype3; $akWert = $getItem->attrvalue3; }
            if($i==4) { $akBoni = $getItem->attrtype4; $akWert = $getItem->attrvalue4; }
            if($i==5) { $akBoni = $getItem->attrtype5; $akWert = $getItem->attrvalue5; }
            if($i==6) { $akBoni = $getItem->attrtype6; $akWert = $getItem->attrvalue6; }
            echo'#'.($i+1).'&nbsp;';
            if(isset($itemBoni[$akBoni])) {
              echo $itemBoni[$akBoni];
            }
            else {
              echo $akBoni;
            }
            echo':&nbsp;'.$akWert;
            echo'<br/>';
          
        }
        echo'</td>';
        echo'</tr>';
        $x++;
      }
      echo'</table>';
      echo'<h3>Iteme din depozit</h3>';
      echo'<table class="itemlist">';
      echo'<tr>';
      echo'<th class="topLine">Cont</th>';
      echo'<th class="topLine">Item</th>';
      echo'<th class="topLine">Loca&#355;ie</th>';
      echo'<th class="topLine">Pietre</th>';
      echo'<th class="topLine">Bonus</th>';
      echo'</tr>';
      
      $sqlQry2=mysql_query($sqlCmd2,$sqlServ);
      $x=0;
      while($getItem=mysql_fetch_object($sqlQry2)) {
        $zF = (($x%2)==0) ? "tdunkel" : "thell";
        echo'<tr>';
        echo'<td class="'.$zF.'"><a href="index.php?s=admin&a=users&acc='.$getItem->owner_id.'">'.$getItem->login.'</a></td>';
        echo'<td class="'.$zF.'">';
        $getName = compareItems($getItem->vnum);
        $itemStufe = (checkInt($getName['stufe'])) ? "+".$getName['stufe'] : '';
        echo $getName['item'].$itemStufe;
        echo'</td>';
        echo'<td class="'.$zF.'">'.$getItem->window.'</td>';
        echo'<td class="'.$zF.'">';
        for($i=0;$i<6;$i++) {
            if($i==0) { $akSocket = $getItem->socket0; }
            if($i==1) { $akSocket = $getItem->socket1; }
            if($i==2) { $akSocket = $getItem->socket2; }
            if($i==3) { $akSocket = $getItem->socket3; }
            if($i==4) { $akSocket = $getItem->socket4; }
            if($i==5) { $akSocket = $getItem->socket5; }
            echo'#'.($i+1).'&nbsp;';
            if(isset($itemSteine[$akSocket])) {
              echo $itemSteine[$akSocket];
            }
            else {
              echo $akSocket;
            }
            echo'<br/>';
          
          }
        echo'</td>';
        echo'<td class="'.$zF.'">';
        for($i=0;$i<7;$i++) {
            if($i==0) { $akBoni = $getItem->attrtype0; $akWert = $getItem->attrvalue0; }
            if($i==1) { $akBoni = $getItem->attrtype1; $akWert = $getItem->attrvalue1; }
            if($i==2) { $akBoni = $getItem->attrtype2; $akWert = $getItem->attrvalue2; }
            if($i==3) { $akBoni = $getItem->attrtype3; $akWert = $getItem->attrvalue3; }
            if($i==4) { $akBoni = $getItem->attrtype4; $akWert = $getItem->attrvalue4; }
            if($i==5) { $akBoni = $getItem->attrtype5; $akWert = $getItem->attrvalue5; }
            if($i==6) { $akBoni = $getItem->attrtype6; $akWert = $getItem->attrvalue6; }
            echo'#'.($i+1).'&nbsp;';
            if(isset($itemBoni[$akBoni])) {
              echo $itemBoni[$akBoni];
            }
            else {
              echo $akBoni;
            }
            echo':&nbsp;'.$akWert;
            echo'<br/>';
          
        }
        echo'</td>';
        echo'</tr>';
        $x++;
      }
      echo'</table>';
      
    }
  
  
  ?>
<?PHP
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>