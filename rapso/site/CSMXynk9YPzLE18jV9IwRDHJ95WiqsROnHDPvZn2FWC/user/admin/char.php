<?PHP
  if($_SESSION['user_admin']>=$adminRights['char_ansicht']) {
  
    echo '<h2>Administrare - prezentare cont</h2>';
    
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
        echo'<h3><br/>&nbsp;&nbsp;Caractere - prezentare general&#259;: '.$chaData->name.' ('.$chaData->id.')</h3>';
        echo'<p><br/>&nbsp;&nbsp;Apar&#355;ine contului: <a href="index.php?s=admin&a=users&acc='.$chaData->account_id.'">'.$chaData->login.'</a> ('.$chaData->account_id.')</p>';
        ?><br/>
        <div style="position=:center; margin-left:10px;"><table>
          <tr>
            <th class="topLine">Caracter:</th>
            <td><?PHP echo $chaData->name; ?></td>
            <th class="topLine">Regat:</th>
            <td class="thell">&nbsp;<?PHP echo $gReiche[$chaData->empire]; ?></td>
          </tr>
          <tr>
            <th class="topLine">Nivel:</th>
            <td class="tdunkel">&nbsp;<?PHP echo $chaData->level; ?></td>
            <th class="topLine">Timp:&nbsp;</th>
            <td class="tdunkel">&nbsp;<?PHP echo $chaData->playtime; ?> &nbsp;Minute</td>
          </tr>
          <tr>
            <th class="topLine">Ras&#259;:</th>
            <td class="thell"><?PHP echo $aRassen[$chaData->job]; ?></td>
            <th class="topLine">Yang:</th>
            <td class="thell">&nbsp;<?PHP echo $chaData->gold; ?><br/><br/></td>
          </tr>
          <tr>
            <th class="topLine">&nbsp;&nbsp;Ultima dat&#259;  c&#226;nd a intrat:</th>
            <td class="tdunkel">&nbsp;<?PHP echo $chaData->last_play; ?></td>
            <th class="topLine"></th>
            <td class="tdunkel"></td>
          </tr>
        </table>
        <div class="splitLeft">&nbsp;&nbsp;<?PHP listLager(checkPos($chaData->account_id),0); ?></div>
        <div class="splitRight">&nbsp;&nbsp;<?PHP listLager(checkPos($chaData->account_id),1); ?><br/></div>
        <br/><h5>&nbsp;&nbsp;Iteme (echipate)</h5><br/>
        <?PHP
        $sqlCmd = "SELECT * FROM player.item WHERE owner_id='".$chaData->id."' AND window='EQUIPMENT'";
        $sqlQry = mysql_query($sqlCmd,$sqlServ);
        
        echo"<table class=\"itemlist\">\n<tr>\n";
        echo"<th class=\"topLine\">&nbsp;ID item</th>\n";
        echo"<th class=\"topLine\">&nbsp;&nbsp;&nbsp;&nbsp;Item (Nume/vnum)</th>\n";
        echo"<th class=\"topLine\">&nbsp;&nbsp;&nbsp;&nbsp;Stagiu</th>\n";
        echo"<th class=\"topLine\">&nbsp;&nbsp;&nbsp;&nbsp;Cantitate</th>";
        echo"<th class=\"topLine\">&nbsp;&nbsp;&nbsp;&nbsp;Sloturi (Pietre)</th>\n";
        echo"<th class=\"topLine\">&nbsp;&nbsp;&nbsp;&nbsp;Bonus</th>\n</tr>\n";  
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
          echo'<td class="'.$zF.'">&nbsp;'.$getItems->id.'</td>';
          echo'<td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$getName['item'].'</td><td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$itemStufe.'</td>';
          echo'<td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$getItems->count.'</td>';
          echo'<td class="'.$zF.'">';
          for($i=0;$i<6;$i++) {
            if($i==0) { $akSocket = $getItems->socket0; }
            if($i==1) { $akSocket = $getItems->socket1; }
            if($i==2) { $akSocket = $getItems->socket2; }
            if($i==3) { $akSocket = $getItems->socket3; }
            if($i==4) { $akSocket = $getItems->socket4; }
            if($i==5) { $akSocket = $getItems->socket5; }
            echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#'.($i+1).'&nbsp;';
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
            echo'&nbsp;&nbsp;&nbsp;&nbsp;#'.($i+1).'&nbsp;';
            if(isset($itemBoni[$akBoni])) {
              echo $itemBoni[$akBoni];
            }
            else {
              echo $akBoni;
            }
            echo':&nbsp;'.$akWert;
            echo'<br/>';
          
          }
          echo'<br/><br/><br/></td>';
          echo'</tr>';
          $x++;
        }
        
        echo'</table>';
        
        echo'<h5>&nbsp;&nbsp;Iteme (Inventar)</h5><br/>';
        $sqlCmd = "SELECT * FROM player.item WHERE owner_id='".$chaData->id."' AND window='INVENTORY'";
        $sqlQry = mysql_query($sqlCmd,$sqlServ);
        
        echo"<table class=\"itemlist\">\n<tr>\n";
        echo"<th class=\"topLine\">&nbsp;ID item</th>\n";
        echo"<th class=\"topLine\">&nbsp;&nbsp;&nbsp;&nbsp;Item (Nume/vnum)</th>\n";
        echo"<th class=\"topLine\">&nbsp;&nbsp;&nbsp;&nbsp;Stagiu</th>\n";
        echo"<th class=\"topLine\">&nbsp;&nbsp;&nbsp;&nbsp;Cantitate</th>";
        echo"<th class=\"topLine\">&nbsp;&nbsp;&nbsp;&nbsp;Sloturi (Pietre)</th>\n";
        echo"<th class=\"topLine\">&nbsp;&nbsp;&nbsp;&nbsp;Bonus</th>\n</tr>\n";  
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
          echo'<td class="'.$zF.'">&nbsp;'.$getItems->id.'</td>';
          echo'<td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;'.$getName['item'].'</td><td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$itemStufe.'</td>';
          
          echo'<td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$getItems->count.'</td>';
          
          echo'<td class="'.$zF.'">';
          for($i=0;$i<6;$i++) {
            if($i==0) { $akSocket = $getItems->socket0; }
            if($i==1) { $akSocket = $getItems->socket1; }
            if($i==2) { $akSocket = $getItems->socket2; }
            if($i==3) { $akSocket = $getItems->socket3; }
            if($i==4) { $akSocket = $getItems->socket4; }
            if($i==5) { $akSocket = $getItems->socket5; }
            echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#'.($i+1).'&nbsp;';
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
            echo'&nbsp;&nbsp;&nbsp;&nbsp;#'.($i+1).'&nbsp;';
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
        
        echo'<h5>Iteme (Depozit)</h5><br/>';
        $sqlCmd = "SELECT * FROM player.item WHERE owner_id='".$chaData->account_id."' AND window='SAFEBOX'";
        $sqlQry = mysql_query($sqlCmd,$sqlServ);
        
        echo"<table class=\"itemlist\">\n<tr>\n";
        echo"<th class=\"topLine\">&nbsp;ID item</th>\n";
        echo"<th class=\"topLine\">&nbsp;&nbsp;&nbsp;&nbsp;Item (Nume/vnum)</th>\n";
        echo"<th class=\"topLine\">&nbsp;&nbsp;&nbsp;&nbsp;Stagiu</th>\n";
        echo"<th class=\"topLine\">&nbsp;&nbsp;&nbsp;&nbsp;Cantitate</th>";
        echo"<th class=\"topLine\">&nbsp;&nbsp;&nbsp;&nbsp;Sloturi (Pietre)</th>\n";
        echo"<th class=\"topLine\">&nbsp;&nbsp;&nbsp;&nbsp;Bonus</th>\n</tr>\n";  
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
          echo'<td class="'.$zF.'">&nbsp;'.$getItems->id.'</td>';
          echo'<td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;'.$getName['item'].'</td><td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$itemStufe.'</td>';
          
          echo'<td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$getItems->count.'</td>';
          
          echo'<td class="'.$zF.'">';
          for($i=0;$i<6;$i++) {
            if($i==0) { $akSocket = $getItems->socket0; }
            if($i==1) { $akSocket = $getItems->socket1; }
            if($i==2) { $akSocket = $getItems->socket2; }
            if($i==3) { $akSocket = $getItems->socket3; }
            if($i==4) { $akSocket = $getItems->socket4; }
            if($i==5) { $akSocket = $getItems->socket5; }
            echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#'.($i+1).'&nbsp;';
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
            echo'&nbsp;&nbsp;&nbsp;&nbsp;#'.($i+1).'&nbsp;';
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
        echo'<p>ID-ul Contului care l-a&#355;i introdus nu exist&#259;!</p>';      
      }
    }
    else 
    {
      echo'<p class="meldung">Nu a&#355;i introdus nici un ID!</p>';
    }
    
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?></div><br/>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>