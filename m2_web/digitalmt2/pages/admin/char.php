
			<div class="postui2 text-title">
					<h2>
                Account Bearbeiten
                    
                    </h2>
				
				</div>
				<div class="postui2 text-con">
				<div class="con-wrap">
<?PHP
  if($_SESSION['user_admin']>=$adminRights['char_ansicht']) {
  
  
    
    if(isset($_GET['id']) && !empty($_GET['id'])) 
    {
      $sqlCmd = "SELECT 
      player.id,player.gold,player.last_play,player.name,player.level,player.ip,account.id as account_id,account.login, player.playtime, player_index.empire,player.job
      FROM player.player 
      LEFT JOIN account.account 
      ON account.id=player.account_id 
      LEFT JOIN player.player_index 
      ON player_index.id=player.account_id 
      WHERE player.id='".$_GET['id']."' 
      LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlServ);
      if(mysql_num_rows($sqlQry)>0) 
      {
        $chaData = mysql_fetch_object($sqlQry);
        echo'<h3>Charakter &Uuml;bersicht: '.$chaData->name.' ('.$chaData->id.')</h3>';
        echo'<p>Geh&ouml;rt zu dem Account: <a href="index.php?s=admin&a=users&acc='.$chaData->account_id.'">'.$chaData->login.'</a> ('.$chaData->account_id.')</p>';
        ?>
        <table>
          <tr>
            <th class="topLine">Charakter:</th>
            <td class="thell"><?PHP echo $chaData->name; ?></td>
            <th class="topLine">Reich:</th>
            <td class="thell"><?PHP echo $gReiche[$chaData->empire]; ?></td>
          </tr>
          <tr>
            <th class="topLine">Level:</th>
            <td class="tdunkel"><?PHP echo $chaData->level; ?></td>
            <th class="topLine">Spielzeit:</th>
            <td class="tdunkel"><?PHP echo $chaData->playtime; ?></td>
          </tr>
          <tr>
            <th class="topLine">Rasse:</th>
            <td class="thell"><?PHP echo $aRassen[$chaData->job]; ?></td>
            <th class="topLine">Yang:</th>
            <td class="thell"><?PHP echo $chaData->gold; ?></td>
          </tr>
          <tr>
            <th class="topLine">Zuletzt online:</th>
            <td class="tdunkel"><?PHP echo $chaData->last_play; ?></td>
            <th class="topLine"></th>
            <td class="tdunkel"></td>
          </tr>
        </table>
        <div class="splitLeft"><?PHP listLager(checkPos($chaData->account_id),0); ?></div>
        <div class="splitRight"><?PHP listLager(checkPos($chaData->account_id),1); ?></div>
        <h4>Items (ausgerüstet)</h4>
        <?PHP
        $sqlCmd = "SELECT * FROM player.item WHERE owner_id='".$chaData->id."' AND window='EQUIPMENT'";
        $sqlQry = mysql_query($sqlCmd,$sqlServ);
        
        echo"<table class=\"itemlist\">\n<tr>\n";
        echo"<th class=\"topLine\">ItemID</th>\n";
        echo"<th class=\"topLine\">Item (Name/vnum)</th>\n";
        echo"<th class=\"topLine\">Stufe</th>\n";
        echo"<th class=\"topLine\">Menge</th>";
        echo"<th class=\"topLine\">Sockets (z. B. Steine)</th>\n";
        echo"<th class=\"topLine\">Boni</th>\n</tr>\n";  
        $x=0;
        while($getItems=mysql_fetch_object($sqlQry)) {
          if(($x%2)==0) 
          { 
            $zF="tdunkel"; 
          }
          else 
          { 
            $zF="thell"; 
          }
      
          $getName = compareItems($getItems->vnum);
          $itemStufe = (checkInt($getName['stufe'])) ? "+".$getName['stufe'] : '';
          echo'<tr>';
          echo'<td class="'.$zF.'">'.$getItems->id.'</td>';
          echo'<td class="'.$zF.'">'.$getName['item'].'</td><td class="'.$zF.'">'.$itemStufe.'</td>';
          echo'<td class="'.$zF.'">'.$getItems->count.'</td>';
          
          echo'<td class="'.$zF.'">';
          for($i=0;$i<6;$i++) {
            if($i==0) { $akSocket = $getItems->socket0; }
            if($i==1) { $akSocket = $getItems->socket1; }
            if($i==2) { $akSocket = $getItems->socket2; }
            if($i==3) { $akSocket = $getItems->socket3; }
            if($i==4) { $akSocket = $getItems->socket4; }
            if($i==5) { $akSocket = $getItems->socket5; }
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
            if($i==0) { $akBoni = $getItems->attrtype0; $akWert = $getItems->attrvalue0; }
            if($i==1) { $akBoni = $getItems->attrtype1; $akWert = $getItems->attrvalue1; }
            if($i==2) { $akBoni = $getItems->attrtype2; $akWert = $getItems->attrvalue2; }
            if($i==3) { $akBoni = $getItems->attrtype3; $akWert = $getItems->attrvalue3; }
            if($i==4) { $akBoni = $getItems->attrtype4; $akWert = $getItems->attrvalue4; }
            if($i==5) { $akBoni = $getItems->attrtype5; $akWert = $getItems->attrvalue5; }
            if($i==6) { $akBoni = $getItems->attrtype6; $akWert = $getItems->attrvalue6; }
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
        
        echo'<h4>Items (Inventar)</h4>';
        $sqlCmd = "SELECT * FROM player.item WHERE owner_id='".$chaData->id."' AND window='INVENTORY'";
        $sqlQry = mysql_query($sqlCmd,$sqlServ);
        
        echo"<table class=\"itemlist\">\n<tr>\n";
        echo"<th class=\"topLine\">ItemID</th>\n";
        echo"<th class=\"topLine\">Item (Name/vnum)</th>\n";
        echo"<th class=\"topLine\">Stufe</th>\n";
        echo"<th class=\"topLine\">Menge</th>";
        echo"<th class=\"topLine\">Sockets (z. B. Steine)</th>\n";
        echo"<th class=\"topLine\">Boni</th>\n</tr>\n";  
        $x=0;
        while($getItems=mysql_fetch_object($sqlQry)) {
          if(($x%2)==0) 
          { 
            $zF="tdunkel"; 
          }
          else 
          { 
            $zF="thell"; 
          }
      
          $getName = compareItems($getItems->vnum);
          $itemStufe = (checkInt($getName['stufe'])) ? "+".$getName['stufe'] : '';
          echo'<tr>';
          echo'<td class="'.$zF.'">'.$getItems->id.'</td>';
          echo'<td class="'.$zF.'">'.$getName['item'].'</td><td class="'.$zF.'">'.$itemStufe.'</td>';
          
          echo'<td class="'.$zF.'">'.$getItems->count.'</td>';
          
          echo'<td class="'.$zF.'">';
          for($i=0;$i<6;$i++) {
            if($i==0) { $akSocket = $getItems->socket0; }
            if($i==1) { $akSocket = $getItems->socket1; }
            if($i==2) { $akSocket = $getItems->socket2; }
            if($i==3) { $akSocket = $getItems->socket3; }
            if($i==4) { $akSocket = $getItems->socket4; }
            if($i==5) { $akSocket = $getItems->socket5; }
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
            if($i==0) { $akBoni = $getItems->attrtype0; $akWert = $getItems->attrvalue0; }
            if($i==1) { $akBoni = $getItems->attrtype1; $akWert = $getItems->attrvalue1; }
            if($i==2) { $akBoni = $getItems->attrtype2; $akWert = $getItems->attrvalue2; }
            if($i==3) { $akBoni = $getItems->attrtype3; $akWert = $getItems->attrvalue3; }
            if($i==4) { $akBoni = $getItems->attrtype4; $akWert = $getItems->attrvalue4; }
            if($i==5) { $akBoni = $getItems->attrtype5; $akWert = $getItems->attrvalue5; }
            if($i==6) { $akBoni = $getItems->attrtype6; $akWert = $getItems->attrvalue6; }
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
        
        echo'<h4>Items (Lager)</h4>';
        $sqlCmd = "SELECT * FROM player.item WHERE owner_id='".$chaData->account_id."' AND window='SAFEBOX'";
        $sqlQry = mysql_query($sqlCmd,$sqlServ);
        
        echo"<table class=\"itemlist\">\n<tr>\n";
        echo"<th class=\"topLine\">ItemID</th>\n";
        echo"<th class=\"topLine\">Item (Name/vnum)</th>\n";
        echo"<th class=\"topLine\">Stufe</th>\n";
        echo"<th class=\"topLine\">Menge</th>";
        echo"<th class=\"topLine\">Sockets (z. B. Steine)</th>\n";
        echo"<th class=\"topLine\">Boni</th>\n</tr>\n";  
        $x=0;
        while($getItems=mysql_fetch_object($sqlQry)) {
          if(($x%2)==0) 
          { 
            $zF="tdunkel"; 
          }
          else 
          { 
            $zF="thell"; 
          }
      
          $getName = compareItems($getItems->vnum);
          $itemStufe = (checkInt($getName['stufe'])) ? "+".$getName['stufe'] : '';
          echo'<tr>';
          echo'<td class="'.$zF.'">'.$getItems->id.'</td>';
          echo'<td class="'.$zF.'">'.$getName['item'].'</td><td class="'.$zF.'">'.$itemStufe.'</td>';
          
          echo'<td class="'.$zF.'">'.$getItems->count.'</td>';
          
          echo'<td class="'.$zF.'">';
          for($i=0;$i<6;$i++) {
            if($i==0) { $akSocket = $getItems->socket0; }
            if($i==1) { $akSocket = $getItems->socket1; }
            if($i==2) { $akSocket = $getItems->socket2; }
            if($i==3) { $akSocket = $getItems->socket3; }
            if($i==4) { $akSocket = $getItems->socket4; }
            if($i==5) { $akSocket = $getItems->socket5; }
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
            if($i==0) { $akBoni = $getItems->attrtype0; $akWert = $getItems->attrvalue0; }
            if($i==1) { $akBoni = $getItems->attrtype1; $akWert = $getItems->attrvalue1; }
            if($i==2) { $akBoni = $getItems->attrtype2; $akWert = $getItems->attrvalue2; }
            if($i==3) { $akBoni = $getItems->attrtype3; $akWert = $getItems->attrvalue3; }
            if($i==4) { $akBoni = $getItems->attrtype4; $akWert = $getItems->attrvalue4; }
            if($i==5) { $akBoni = $getItems->attrtype5; $akWert = $getItems->attrvalue5; }
            if($i==6) { $akBoni = $getItems->attrtype6; $akWert = $getItems->attrvalue6; }
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
      else
      {
        echo'<p>Die eingegebene Account-ID existiert nicht!</p>';      
      }
    }
    else 
    {
      echo'<p class="meldung">Es wurde keine Account-ID eingegeben.</p>';
    }
    
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>	</div>

  </div> 
				<div class="postui2 text-end">
             
                
                  
    </div>